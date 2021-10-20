<?php

namespace App\Http\Controllers\Api\Organizations;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrganizationTypeController extends Controller
{
    public function __invoke () : JsonResponse
    {
        return response()->json([
            'data' => config('littlepets.organizations.types')
        ]);
    }
}
