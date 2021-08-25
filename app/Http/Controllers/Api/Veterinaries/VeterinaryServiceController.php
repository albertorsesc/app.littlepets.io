<?php

namespace App\Http\Controllers\Api\Veterinaries;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class VeterinaryServiceController extends Controller
{
    public function __invoke () : JsonResponse
    {
        return response()->json([
            'data' => config('littlepets.veterinary_services')
        ]);
    }
}
