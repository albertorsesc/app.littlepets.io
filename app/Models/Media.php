<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    protected $touches = ['mediable'];
    protected $fillable = ['file_name', 'mediable_id', 'mediable_type'];

    protected static function boot ()
    {
        parent::boot();
        self::deleting(function ($media) {
            if (app()->environment('production')) {
                Storage::disk('s3')->delete($media->file_name);
            } else {
                Storage::delete($media->file_name);
            }
        });
    }

    public function mediable() : MorphTo
    {
        return $this->morphTo();
    }

    public function getFullUrl() : string
    {
        return \Storage::url($this->file_name);
    }
}
