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
            LostPet::isPublished()
                   ->with([
                       'location.state',
                       'pet.media',
                       'pet.specie',
                       'pet.user:id,first_name,last_name,email',
                   ])
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
        $this->authorize('update', $lostPet);

        $lostPet->pet()->update([
            'specie_id' => $request->specie_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'size' => $request->size,
            'age' => $request->age,
            'age_range' => $request->age_range,
        ]);

        $lostPet->update($request->all());

        return new LostPetResource(
            $lostPet->load([
                'location.state',
                'comments',
                'pet.specie',
                'pet.user:id,first_name,last_name,email',
            ])
        );
    }

    public function destroy(LostPet $lostPet)
    {
        $this->authorize('update', $lostPet);

        $lostPet->delete();

        return response([], 204);
    }
}
