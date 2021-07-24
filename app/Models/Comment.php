<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\SerializeTimestamps;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use SerializeTimestamps;

    protected static function boot ()
    {
        parent::boot();
        self::creating(fn ($comment) => $comment->user_id = auth()->id());
    }

    protected $fillable = ['body'];

    /* Relations */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
