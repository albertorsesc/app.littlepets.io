<?php

namespace App\Models\Concerns;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(
            Comment::class,
            'commentable'
        )->latest('updated_at');
    }

    public function comment($body) : Model
    {
        return $this->comments()->create([
            'body' => $body,
        ]);
    }
}
