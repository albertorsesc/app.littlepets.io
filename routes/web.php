<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SuggestionController;
    use App\Http\Controllers\Web\Blog\BlogController;
    use App\Http\Controllers\Auth\SocialLoginController;
    use App\Http\Controllers\Web\LostPets\LostPetController;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
    use App\Http\Controllers\Web\Blog\BlogCategoryController;
    use App\Http\Controllers\Web\Adoptions\AdoptionController;
    use App\Http\Controllers\Web\Veterinaries\VeterinaryController;
    use App\Http\Controllers\Web\Blog\Articles\Admin\ArticleController;
    use App\Http\Controllers\Api\Veterinaries\Actions\UploadLogoController;
    use App\Http\Controllers\Web\Blog\Articles\ArticleController as PublicArticleController;

    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/oauth/login/{driver}/redirect', [SocialLoginController::class, 'redirectToProvider'])->name('social-login.redirect');
    Route::get('/oauth/login/{driver}/callback', [SocialLoginController::class, 'handleProviderCallback'])->name('social-login.callback');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/inicio');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::view('/inicio', 'dashboard')->name('home');
//        Route::redirect('dashboard', 'adopciones');

        Route::get('adopciones', [AdoptionController::class, 'index'])->name('web.adoptions.index');
        Route::get('adopciones/{adoption:uuid}', [AdoptionController::class, 'show'])->name('web.adoptions.show');

        Route::get('perdidos-y-encontrados', [LostPetController::class, 'index'])->name('web.lost-pets.index');
        Route::get('perdidos-y-encontrados/{lostPet:uuid}', [LostPetController::class, 'show'])->name('web.lost-pets.show');

        Route::get('veterinarias', [VeterinaryController::class, 'index'])->name('web.veterinaries.index');
        Route::get('veterinarias/{veterinary}', [VeterinaryController::class, 'show'])->name('web.veterinaries.show');

        Route::put(
            'veterinaries/{veterinary:slug}/image',
            UploadLogoController::class
        )->name('veterinaries.logo.store');

        Route::view('sugerencias', 'suggestions')->name('web.suggestions.index');
        Route::post('suggestions', SuggestionController::class)->name('suggestions.store');

        /* Blog */
        Route::get('blog', [BlogController::class, 'index'])->name('web.blog.index');

        // Blog::Admin
        Route::get('blog/editor/articulos', [ArticleController::class, 'index'])->name('web.blog.admin.articles.index');
        Route::get('blog/editor/articulos/crear', [ArticleController::class, 'create'])->name('web.blog.admin.articles.create');
        Route::post('blog/editor/articulos', [ArticleController::class, 'store'])->name('web.blog.admin.articles.store');
        Route::get('blog/editor/articulos/{article}/editar', [ArticleController::class, 'edit'])->name('web.blog.admin.articles.edit');
        Route::put('blog/editor/articulos/{article}', [ArticleController::class, 'update'])->name('web.blog.admin.articles.update');
        Route::delete('blog/editor/articulos/{article}', [ArticleController::class, 'destroy'])->name('web.blog.admin.articles.destroy');

        // Blog::Categories
        Route::get('blog/categorias', [BlogCategoryController::class, 'index'])->name('web.blog.categories.index');
        Route::post('blog/categorias', [BlogCategoryController::class, 'store'])->name('web.blog.categories.store');
        Route::get('blog/categorias/crear', [BlogCategoryController::class, 'create'])->name('web.blog.categories.create');

        // Blog::Articles
        Route::get('blog/articulos/{article}', [PublicArticleController::class, 'show'])->name('web.blog.articles.show');
    });

    /*Route::get('resize', function () {
        \Intervention\Image\Facades\Image::make('img/lost-pets.png')
                                         ->filter(new \App\Models\Concerns\InterventionImage\Filters\MediumFilter())
                                         ->save('img/lost-pets_medium.png');
    });*/

