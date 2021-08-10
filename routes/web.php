<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
    use App\Http\Controllers\Web\LostPets\LostPetController;
    use App\Http\Controllers\Web\Adoptions\AdoptionController;
    use App\Http\Controllers\Web\Veterinaries\VeterinaryController;

    Route::get('/', function () {
        return redirect()->route('web.adoptions.index');
    });

    Route::middleware(['auth:sanctum',])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::redirect('dashboard', 'adopciones');

        Route::get('adopciones', [AdoptionController::class, 'index'])->name('web.adoptions.index');
        Route::get('adopciones/{adoption}', [AdoptionController::class, 'show'])->name('web.adoptions.show');

        Route::get('perdidos-y-encontrados', [LostPetController::class, 'index'])->name('web.lost-pets.index');
        Route::get('perdidos-y-encontrados/{lostPet}', [LostPetController::class, 'show'])->name('web.lost-pets.show');

        Route::get('veterinarias', [VeterinaryController::class, 'index'])->name('web.veterinaries.index');
        Route::get('veterinarias/{veterinary}', [VeterinaryController::class, 'show'])->name('web.veterinaries.show');

    });

    /*Route::get('resize', function () {
        \Intervention\Image\Facades\Image::make('img/lost-pets.png')
                                         ->filter(new \App\Models\Concerns\InterventionImage\Filters\MediumFilter())
                                         ->save('img/lost-pets_medium.png');
    });*/

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/inicio');
    })->middleware(['auth', 'signed'])->name('verification.verify');
