<?php

    use App\Http\Controllers\Api\StateController;
    use App\Http\Controllers\Api\SpecieController;
    use App\Http\Controllers\Api\CountryController;
    use App\Http\Controllers\Api\Pets\PetImageController;
    use App\Http\Controllers\Api\LostPets\LostPetController;
    use App\Http\Controllers\Api\Adoptions\AdoptionController;
    use App\Http\Controllers\Api\Sepomex\CityByStateController;
    use App\Http\Controllers\Api\LostPets\UserLostPetController;
    use App\Http\Controllers\Api\Adoptions\UserAdoptionController;
    use App\Http\Controllers\Api\LostPets\LostPetCommentController;
    use App\Http\Controllers\Api\Teams\TeamController;
    use App\Http\Controllers\Api\Veterinaries\VeterinaryController;
    use App\Http\Controllers\Api\LostPets\LostPetLocationController;
    use App\Http\Controllers\Api\Veterinaries\Actions\LikeController;
    use App\Http\Controllers\Api\Adoptions\AdoptionCommentController;
    use App\Http\Controllers\Api\Adoptions\AdoptionLocationController;
    use App\Http\Controllers\Api\Sepomex\NeighborhoodByCityController;
    use App\Http\Controllers\Api\Veterinaries\UserVeterinaryController;
    use App\Http\Controllers\Api\LostPets\Actions\MarkAsFoundController;
    use App\Http\Controllers\Api\LostPets\Actions\ReportLostPetController;
    use App\Http\Controllers\Api\Veterinaries\VeterinaryServiceController;
    use App\Http\Controllers\Api\Veterinaries\VeterinaryLocationController;
    use App\Http\Controllers\Api\LostPets\Actions\PublishLostPetController;
    use App\Http\Controllers\Api\Adoptions\Actions\MarkAsAdoptedController;
    use App\Http\Controllers\Api\Adoptions\Actions\ReportAdoptionController;
    use App\Http\Controllers\Api\Adoptions\Actions\PublishAdoptionController;
    use App\Http\Controllers\Api\Veterinaries\Actions\PublishVeterinaryController;

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('countries', CountryController::class)->name('api.countries.index');
        Route::get('states', StateController::class)->name('api.states.index');
        Route::get('states/{state}/cities', CityByStateController::class)->name('api.states.cities.index');
        Route::get('cities/{city}/neighborhoods', NeighborhoodByCityController::class)->name('api.cities.neighborhoods.index');

        Route::get('species', [SpecieController::class, 'index'])->name('api.species.index');

        /* Pets */
        Route::post('pets/{pet}/images', [PetImageController::class, 'store'])->name('api.pets.images.store');
        Route::delete('pets/{pet}/images/{media:id}', [PetImageController::class, 'destroy'])->name('api.pets.images.destroy');

        /* Adoptions */
        Route::get('adoptions', [AdoptionController::class, 'index'])->name('api.adoptions.index');
        Route::post('adoptions', [AdoptionController::class, 'store'])->name('api.adoptions.store');
        Route::put('adoptions/{adoption:uuid}', [AdoptionController::class, 'update'])->name('api.adoptions.update');
        Route::delete('adoptions/{adoption:uuid}', [AdoptionController::class, 'destroy'])->name('api.adoptions.destroy');

        Route::get('my-adoptions', UserAdoptionController::class)->name('api.user.adoptions.index');
        Route::put('adoptions/{adoption:uuid}/toggle', PublishAdoptionController::class)->name('api.adoptions.toggle');
        Route::put('adoptions/{adoption:uuid}/adopted', MarkAsAdoptedController::class)->name('api.adoptions.adopted');
        Route::post('adoptions/{adoption:uuid}/report', ReportAdoptionController::class)->name('api.adoptions.report');

        Route::post('adoptions/{adoption:uuid}/location', [AdoptionLocationController::class, 'store'])->name('api.adoptions.location.store');
        Route::put('adoptions/{adoption:uuid}/location', [AdoptionLocationController::class, 'update'])->name('api.adoptions.location.update');

        /* Adoption Comments */
        Route::post('adoptions/{adoption:uuid}/comments', [AdoptionCommentController::class, 'store'])->name('api.adoptions.comments.store');
        Route::put('adoptions/{adoption:uuid}/comments/{comment}', [AdoptionCommentController::class, 'update'])->name('api.adoptions.comments.update');
        Route::delete('adoptions/{adoption:uuid}/comments/{comment}', [AdoptionCommentController::class, 'destroy'])->name('api.adoptions.comments.destroy');

        /* Lost and Found */
        Route::get('lost-pets', [LostPetController::class, 'index'])->name('api.lost-pets.index');
        Route::post('lost-pets', [LostPetController::class, 'store'])->name('api.lost-pets.store');
        Route::put('lost-pets/{lostPet:uuid}', [LostPetController::class, 'update'])->name('api.lost-pets.update');
        Route::delete('lost-pets/{lostPet:uuid}', [LostPetController::class, 'destroy'])->name('api.lost-pets.destroy');

        Route::get('my-lost-pets', UserLostPetController::class)->name('api.user-lost-pets.index');
        Route::put('lost-pets/{lostPet:uuid}/toggle', PublishLostPetController::class)->name('api.lost-pets.toggle');
        Route::post('lost-pets/{lostPet:uuid}/report', ReportLostPetController::class)->name('api.lost-pets.report');
        Route::put('lost-pets/{lostPet:uuid}/found', MarkAsFoundController::class)->name('api.lost-pets.found');

        Route::post('lost-pets/{lostPet:uuid}/location', [LostPetLocationController::class, 'store'])->name('api.lost-pets.location.store');
        Route::put('lost-pets/{lostPet:uuid}/location', [LostPetLocationController::class, 'update'])->name('api.lost-pets.location.update');

        Route::post('lost-pets/{lostPet:uuid}/comments', [LostPetCommentController::class, 'store'])->name('api.lost-pets.comments.store');
        Route::put('lost-pets/{lostPet:uuid}/comments/{comment}', [LostPetCommentController::class, 'update'])->name('api.lost-pets.comments.update');
        Route::delete('lost-pets/{lostPet:uuid}/comments/{comment}', [LostPetCommentController::class, 'destroy'])->name('api.lost-pets.comments.destroy');

        /* Veterinaries */
        Route::get('veterinaries', [VeterinaryController::class, 'index'])->name('api.veterinaries.index');
        Route::post('veterinaries', [VeterinaryController::class, 'store'])->name('api.veterinaries.store');
        Route::put('veterinaries/{veterinary}', [VeterinaryController::class, 'update'])->name('api.veterinaries.update');
        Route::delete('veterinaries/{veterinary}', [VeterinaryController::class, 'destroy'])->name('api.veterinaries.destroy');

        Route::get('my-veterinaries', UserVeterinaryController::class)->name('api.user.veterinaries.index');
        Route::get('veterinary-services', VeterinaryServiceController::class)->name('api.veterinary-services.index');
        Route::put('veterinaries/{veterinary:slug}/toggle', PublishVeterinaryController::class)->name('api.veterinaries.toggle');

        Route::post('veterinaries/{veterinary:slug}/location', [VeterinaryLocationController::class, 'store'])->name('api.veterinaries.location.store');
        Route::put('veterinaries/{veterinary:slug}/location', [VeterinaryLocationController::class, 'update'])->name('api.veterinaries.location.update');

        Route::post('veterinaries/{veterinary:slug}/like', [LikeController::class, 'store'])->name('api.veterinaries.likes.store');
        Route::delete('veterinaries/{veterinary:slug}/dislike', [LikeController::class, 'destroy'])->name('api.veterinaries.likes.destroy');

        /* Teams */
        Route::post('teams', [TeamController::class, 'store'])->name('api.teams.store');
    });
