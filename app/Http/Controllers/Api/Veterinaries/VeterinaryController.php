<?php

namespace App\Http\Controllers\Api\Veterinaries;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Veterinaries\Veterinary;
use App\Http\Resources\VeterinaryResource;
use App\Http\Requests\Veterinaries\VeterinaryRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VeterinaryController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return VeterinaryResource::collection(
            Veterinary::isPublished()
                      ->with([
                          'user',
                          'location.state',
                          'location:id,city,state_id,locationable_type,locationable_id',
                      ])
                      ->latest('updated_at')
                      ->get()
        );
    }

    public function store(VeterinaryRequest $request) : JsonResponse {
        return response()->json([
            'data' => new VeterinaryResource(
                Veterinary::create($request->all())
            )
        ],
        201
        );
    }

    public function update(VeterinaryRequest $request, Veterinary $veterinary) : VeterinaryResource
    {
        return new VeterinaryResource(
            tap($veterinary)
                ->update($request->all())
                ->load('user')
        );
    }

    public function destroy(Veterinary $veterinary)
    {
        $veterinary->delete();

        return response([], 204);
    }
}
