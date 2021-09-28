<?php

namespace App\Http\Controllers\Api\Organizations;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Organizations\Organization;
use App\Http\Resources\OrganizationResource;
use App\Http\Requests\Organizations\OrganizationRequest;

class OrganizationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => Organization::query()->latest()->get()
        ]);
    }

    public function store(OrganizationRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new OrganizationResource(
                Organization::create($request->all())
            )
        ],
            201
        );
    }

    public function update(OrganizationRequest $request, Organization $organization) : OrganizationResource
    {
        return new OrganizationResource(
            tap($organization)
                ->update($request->all())
        );
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return response([], 204);
    }
}
