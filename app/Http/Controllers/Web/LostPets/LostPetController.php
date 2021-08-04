<?php

namespace App\Http\Controllers\Web\LostPets;

use App\Models\LostPets\LostPet;
use App\Http\Controllers\Controller;
use App\Http\Resources\LostPetResource;

class LostPetController extends Controller
{
    public function index()
    {
        return view('lost-pets.index');
    }

    public function show(LostPet $lostPet)
    {
        return view('lost-pets.show', [
            'lostPet' => new LostPetResource(
                $lostPet->load([
                    'pet.media',
                    'pet.specie',
                    'pet.user:id,first_name,last_name,email',
                    'comments.user:id,first_name,last_name,email',
                ])
            )
        ]);
    }
}
