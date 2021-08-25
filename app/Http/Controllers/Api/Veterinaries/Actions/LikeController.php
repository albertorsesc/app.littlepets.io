<?php

namespace App\Http\Controllers\Api\Veterinaries\Actions;

use App\Http\Controllers\Controller;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Veterinary $veterinary) : \Illuminate\Http\JsonResponse
    {
        $veterinary->liked();

        return response()->json([
            'data' => [
                'likes' => $veterinary->likes()->get(['id', 'liked_by', 'liked']),
                'likedByAuth' => $veterinary->hasLikeByAuth()
            ]
        ]);
    }

    public function destroy(Veterinary $veterinary) : \Illuminate\Http\JsonResponse
    {
        $veterinary->disliked();

        return response()->json([
            'data' => [
                'likes' => $veterinary->likes,
                'isLiked' => $veterinary->hasLikeByAuth(),
            ]
        ]);
    }
}
