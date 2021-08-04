<?php

namespace App\Http\Controllers\Api\LostPets\Actions;

use App\Models\LostPets\LostPet;
use App\Http\Controllers\Controller;

class PublishLostPetController extends Controller
{
    public function __invoke(LostPet $lostPet)
    {
        $lostPet->toggle();

        return response(
            optional($lostPet->published_at)->diffForHumans()
        );
    }
}
