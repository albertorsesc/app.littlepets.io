<?php

namespace App\Http\Controllers\Api\Pets;

use App\Models\{Media, Pet};
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class PetImageController extends Controller
{
    public function store(Request $request, Pet $pet) : JsonResponse
    {
        if ($pet->media()->count() >= 5) {
            return response()->json([
                'error' => 'Alcanzaste el numero maximo de Imágenes para esta publicación :/'
            ], 422);
        }
        $request->validate([
            'images.*' => ['mimes:jpeg,png,jpg']
        ]);

        foreach ($request->images as $image) {
            $pet->uploadImage($image);
        }
        $pet->touch();

        return response()->json($pet->media, 201);
    }

    public function destroy(Pet $pet, Media $media)
    {
        $pet->deleteMedia($media->id);

        return response([], 204);
    }
}
