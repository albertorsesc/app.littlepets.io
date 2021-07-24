<?php

namespace App\Http\Controllers\Api;

use App\Models\Specie;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class BreedController extends Controller
{
    public function index(Specie $specie) : JsonResponse
    {
        return response()->json([
            'data' => $specie->breeds
        ]);
    }
}
