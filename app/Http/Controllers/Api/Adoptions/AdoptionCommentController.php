<?php

namespace App\Http\Controllers\Api\Adoptions;

use App\Models\Comment;
use App\Models\Adoptions\Adoption;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdoptionCommentController extends Controller
{
    public function store(CommentRequest $request, Adoption $adoption) : CommentResource
    {
        return new CommentResource(
            $adoption->comment($request->body)
                     ->load('user:id,first_name,last_name')
        );
    }

    public function update(CommentRequest $request, Adoption $adoption, Comment $comment) : AnonymousResourceCollection
    {
        $comment->update($request->only('body'));

        $adoption->load('comments.user:id,first_name,last_name,email');

        return CommentResource::collection(
            $adoption->comments
        );
    }

    public function destroy(Adoption $adoption, Comment $comment)
    {
        $comment->delete();

        return response([], 204);
    }
}
