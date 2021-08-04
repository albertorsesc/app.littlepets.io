<?php

namespace App\Http\Controllers\Api\LostPets;

use App\Models\Pet;
use App\Models\LostPets\LostPet;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\LostPetResource;
use App\Http\Requests\LostPets\LostPetRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class LostPetController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return LostPetResource::collection(
            LostPet::with(['pet.user', 'pet.specie'])
                   ->latest('updated_at')
                   ->get()
        );
    }

    public function store(LostPetRequest $request) : JsonResponse
    {
        $pet = Pet::create([
            'specie_id' => $request->specie_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'size' => $request->size,
            'age' => $request->age,
            'age_range' => $request->age_range,
        ]);

        return response()->json(
            new LostPetResource(
                $pet->lostPet()->create($request->all())
                    ->load([
                        'pet.specie',
                        'pet.user:id,first_name,last_name,email',
                    ])
            ),
            201
        );
    }

    public function update(LostPetRequest $request, LostPet $lostPet) : LostPetResource
    {
        $lostPet->pet()->update([
            'specie_id' => $request->specie_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'size' => $request->size,
            'age' => $request->age,
            'age_range' => $request->age_range,
        ]);

        $lostPet->update($request->all());

        return new LostPetResource($lostPet);
    }

    public function destroy(LostPet $lostPet)
    {
        $lostPet->delete();

        return response([], 204);
    }
}
