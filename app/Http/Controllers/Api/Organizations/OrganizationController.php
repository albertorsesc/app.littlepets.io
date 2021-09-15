<?php

namespace App\Http\Controllers\Api\Organizations;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Organizations\Organization;

class OrganizationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => Organization::query()->latest()->get()
        ]);

    }
}
