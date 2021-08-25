<?php

namespace App\Http\Controllers\Api\LostPets;

use App\Http\Controllers\Controller;
use App\Http\Requests\LostPets\LostPetLocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\LostPets\LostPet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LostPetLocationController extends Controller
{
    public function store(LostPetLocationRequest $request, LostPet $lostPet) : JsonResponse
    {
        $this->authorize('update', $lostPet);

        $lostPet->location()->create($request->all());

        $lostPet->load('location.state');

        return response()->json([
            'data' => new LocationResource(
                $lostPet->location
            )
        ], 201);
    }

    public function update(LostPetLocationRequest $request, LostPet $lostPet) : LocationResource
    {
        $this->authorize('update', $lostPet);

        $lostPet->location()->update($request->all());
        $lostPet->touch();

        $lostPet->load('location.state');

        return new LocationResource($lostPet->location);
    }
}
