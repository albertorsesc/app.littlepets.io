<?php

namespace App\Http\Controllers\Api\Adoptions;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;

class AdoptionImageController extends Controller
{
    public function store(Request $request, Adoption $adoption) : JsonResponse
    {
        if ($adoption->media()->count() >= 5) {
            return response()->json(['error' => 'Alcanzaste el numero maximo de Imágenes para esta Adopcion :/'], 422);
        }
        $request->validate([
            'images.*' => ['mimes:jpeg,png,jpg']
        ]);

        foreach ($request->images as $image) {
            $adoption->uploadImage($image);
        }
        $adoption->touch();

        return response()->json($adoption->media, 201);
    }

    public function destroy(Adoption $adoption, Media $media)
    {
        $adoption->deleteMedia($media->id);

        return response([], 204);
    }
}
