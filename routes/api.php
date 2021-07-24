<?php

    use App\Http\Controllers\Api\BreedController;
    use App\Http\Controllers\Api\LostPets\UserLostPetController;
    use App\Http\Controllers\Api\StateController;
    use App\Http\Controllers\Api\SpecieController;
    use App\Http\Controllers\Api\CountryController;
    use App\Http\Controllers\Api\LostPets\LostPetController;
    use App\Http\Controllers\Api\Adoptions\AdoptionController;
    use App\Http\Controllers\Api\Adoptions\UserAdoptionController;
    use App\Http\Controllers\Api\Adoptions\AdoptionImageController;
    use App\Http\Controllers\Api\Adoptions\AdoptionCommentController;
    use App\Http\Controllers\Api\Adoptions\AdoptionLocationController;
    use App\Http\Controllers\Api\Adoptions\Actions\MarkAsAdoptedController;
    use App\Http\Controllers\Api\Adoptions\Actions\ReportAdoptionController;
    use App\Http\Controllers\Api\Adoptions\Actions\PublishAdoptionController;

    Route::get('countries', CountryController::class)->name('api.countries.index');
    Route::get('states', StateController::class)->name('api.states.index');

    Route::get('species', [SpecieController::class, 'index'])->name('api.species.index');
    Route::get('species/{specie}/breeds', [BreedController::class, 'index'])->name('api.species.breeds.index');

    Route::middleware('auth:sanctum')->group(function () {

        /* Adoptions */
        Route::get('adoptions', [AdoptionController::class, 'index'])->name('api.adoptions.index');
        Route::post('adoptions', [AdoptionController::class, 'store'])->name('api.adoptions.store');
        Route::put('adoptions/{adoption}', [AdoptionController::class, 'update'])->name('api.adoptions.update');
        Route::delete('adoptions/{adoption}', [AdoptionController::class, 'destroy'])->name('api.adoptions.destroy');

        Route::get('my-adoptions', UserAdoptionController::class)->name('api.user.adoptions.index');
        Route::put('adoptions/{adoption}/toggle', PublishAdoptionController::class)->name('api.adoptions.toggle');
        Route::put('adoptions/{adoption}/adopted', MarkAsAdoptedController::class)->name('api.adoptions.adopted');
        Route::post('adoptions/{adoption}/report', ReportAdoptionController::class)->name('api.adoptions.report');

        Route::post('adoptions/{adoption}/location', [AdoptionLocationController::class, 'store'])->name('api.adoptions.location.store');
        Route::put('adoptions/{adoption}/location', [AdoptionLocationController::class, 'update'])->name('api.adoptions.location.update');

        Route::post('adoptions/{adoption}/images', [AdoptionImageController::class, 'store'])->name('api.adoptions.images.store');
        Route::delete('adoptions/{adoption}/images/{media:id}', [AdoptionImageController::class, 'destroy'])->name('api.adoptions.images.destroy');

        /* Adoption Comments */
        Route::post('adoptions/{adoption}/comments', [AdoptionCommentController::class, 'store'])->name('api.adoptions.comments.store');
        Route::put('adoptions/{adoption}/comments/{comment}', [AdoptionCommentController::class, 'update'])->name('api.adoptions.comments.update');
        Route::delete('adoptions/{adoption}/comments/{comment}', [AdoptionCommentController::class, 'destroy'])->name('api.adoptions.comments.destroy');

        /* Lost and Found */
        Route::get('lost-pets', [LostPetController::class, 'index'])->name('api.lost-pets.index');
        Route::post('lost-pets', [LostPetController::class, 'store'])->name('api.lost-pets.store');
        Route::put('lost-pets/{lostPet}', [LostPetController::class, 'update'])->name('api.lost-pets.update');
        Route::delete('lost-pets/{lostPet}', [LostPetController::class, 'destroy'])->name('api.lost-pets.destroy');

        Route::get('my-lost-pets', UserLostPetController::class)->name('api.user-lost-pets.index');

    });
