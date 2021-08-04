<?php

namespace App\Http\Controllers\Web\Adoptions;

use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdoptionResource;

class AdoptionController extends Controller
{
    public function index()
    {
        return view('adoptions.index');
    }

    public function show(Adoption $adoption)
    {
        return view('adoptions.show', [
            'adoption' => new AdoptionResource(
                $adoption->load([
                    'pet.media',
                    'pet.specie',
                    'pet.user:id,first_name,last_name,email',
                    'comments.user:id,first_name,last_name,email',
                ])
            )
        ]);
    }
}
