<?php

namespace App\Http\Controllers\Api\LostPets;

use App\Http\Controllers\Controller;
use App\Http\Resources\LostPetResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserLostPetController extends Controller
{
    public function __invoke () : AnonymousResourceCollection
    {
        return LostPetResource::collection(
            auth()
                ->user()
                ->lostPets
                ->load([
                    'pet.specie',
                    'pet.user:id,first_name',
                ])
        );
    }
}
