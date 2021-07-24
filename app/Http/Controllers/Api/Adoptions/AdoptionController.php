<?php

namespace App\Http\Controllers\Api\Adoptions;

use App\Models\Pet;
use Illuminate\Http\JsonResponse;
use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdoptionResource;
use App\Http\Requests\Adoptions\AdoptionRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdoptionController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return AdoptionResource::collection(
            Adoption::with([
                'pet.breed.specie',
                'pet.user:id,first_name,last_name,email',
            ])->latest()
              ->get()
        );
    }

    public function store(AdoptionRequest $request) : JsonResponse
    {
        $pet = Pet::create([
            'breed_id' => $request->breed_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'size' => $request->size,
            'age' => $request->age,
            'age_range' => $request->age_range,
        ]);

        return response()->json([
            'data' => new AdoptionResource(
                $pet->adoption()->create([
                    'title' => $request->title,
                    'phone' => $request->phone,
                    'bio' => $request->bio,
                    'story' => $request->story,
                ])->load([
                    'pet.user:id,first_name,last_name,email',
                    'pet.breed.specie',
//                    'comments.user:id,first_name,last_name,email',
                ])
            )
        ], 201);
    }

    public function update(
        AdoptionRequest $request,
        Adoption $adoption
    ) : AdoptionResource {
        $adoption->pet()->update([
            'breed_id' => $request->breed_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'size' => $request->size,
            'age' => $request->age,
            'age_range' => $request->age_range,
        ]);

        $adoption->update($request->all());

        return new AdoptionResource(
            $adoption->load([
                'pet.breed.specie',
                'pet.user:id,first_name,last_name,email',
//                'comments.user:id,first_name,last_name,email',
            ])
        );
    }

    public function destroy(Adoption $adoption)
    {
        $adoption->pet()->delete();

        return response([], 204);
    }
}
