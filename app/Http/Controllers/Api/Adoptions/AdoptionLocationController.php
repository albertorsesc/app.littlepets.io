<?php

namespace App\Http\Controllers\Api\Adoptions;

use Illuminate\Http\JsonResponse;
use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Http\Requests\Adoptions\AdoptionLocationRequest;

class AdoptionLocationController extends Controller
{
    public function store(AdoptionLocationRequest $request, Adoption $adoption) : JsonResponse
    {
        $adoption->location()->create($request->all());

        $adoption->load('location.state');

        return response()->json([
            'data' => new LocationResource($adoption->location)
        ], 201);
    }

    public function update(AdoptionLocationRequest $request, Adoption $adoption) : LocationResource
    {
        $adoption->location()->update(
            $request->all()
        );
        $adoption->touch();

        $adoption->load('location.state');

        return new LocationResource($adoption->location);
    }
}
