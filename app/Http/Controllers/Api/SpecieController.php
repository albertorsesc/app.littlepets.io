<?php

namespace App\Http\Controllers\Api;

use App\Models\Specie;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class SpecieController extends Controller
{
    public function index() : JsonResponse
    {
        return response()->json([
            'data' => Specie::all()
        ]);
    }
}
