<?php

namespace App\Http\Controllers\Api\Veterinaries;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Veterinaries\Veterinary;
use App\Http\Resources\LocationResource;
use App\Http\Requests\Veterinaries\VeterinaryLocationRequest;

class VeterinaryLocationController extends Controller
{
    public function store(VeterinaryLocationRequest $request, Veterinary $veterinary) : JsonResponse
    {
        $veterinary->location()->create($request->all());

        $veterinary->load('location.state');

        return response()->json([
            'data' => new LocationResource($veterinary->location)
        ], 201);
    }

    public function update(VeterinaryLocationRequest $request, Veterinary $veterinary) : LocationResource
    {
        $veterinary->location()->update(
            $request->all()
        );
        $veterinary->touch();

        $veterinary->load('location.state');

        return new LocationResource($veterinary->location);
    }
}
