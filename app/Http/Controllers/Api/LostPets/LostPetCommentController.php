<?php

namespace App\Http\Controllers\Api\LostPets;

use App\Models\Comment;
use App\Models\LostPets\LostPet ;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LostPetCommentController extends Controller
{
    public function store(CommentRequest $request, LostPet $lostPet) : CommentResource
    {
        return new CommentResource(
            $lostPet->comment($request->body)
                     ->load('user:id,first_name,last_name')
        );
    }

    public function update(CommentRequest $request, LostPet $lostPet, Comment $comment) : AnonymousResourceCollection
    {
        $comment->update($request->only('body'));

        $lostPet->load('comments.user:id,first_name,last_name,email');

        return CommentResource::collection(
            $lostPet->comments
        );
    }

    public function destroy(LostPet $lostPet, Comment $comment)
    {
        $comment->delete();

        return response([], 204);
    }
}
