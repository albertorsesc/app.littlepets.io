<?php

    use App\Http\Controllers\Web\LostPets\LostPetController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Web\Adoptions\AdoptionController;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth:sanctum',])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');

        Route::get('adopciones', [AdoptionController::class, 'index'])->name('web.adoptions.index');
        Route::get('adopciones/{adoption}', [AdoptionController::class, 'show'])->name('web.adoptions.show');

        Route::get('perdidos-y-encontrados', [LostPetController::class, 'index'])->name('web.lost-pets.index');
        Route::get('perdidos-y-encontrados/{lostPet}', [LostPetController::class, 'show'])->name('web.lost-pets.show');

    });

    /*Route::get('resize', function () {
        \Intervention\Image\Facades\Image::make('img/adoptions.png')
                                         ->filter(new \App\Models\Concerns\InterventionImage\Filters\MediumFilter())
                                         ->save('img/adoptions1.png');
    });*/

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/inicio');
    })->middleware(['auth', 'signed'])->name('verification.verify');
