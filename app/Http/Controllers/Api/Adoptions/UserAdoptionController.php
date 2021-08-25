<?php

namespace App\Http\Controllers\Api\Adoptions;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdoptionResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserAdoptionController extends Controller
{
    public function __invoke () : AnonymousResourceCollection
    {
        return AdoptionResource::collection(
            auth()
                ->user()
                ->adoptions
                ->load([
                    'pet.user',
                    'pet.media',
                    'pet.specie',
                    'location.state',
                ])
        );
    }
}
