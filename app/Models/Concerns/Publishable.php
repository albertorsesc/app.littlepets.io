<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Publishable
{

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeIsPublished(Builder $query) : Builder
    {
        return $query->whereNotNull('published_at');
    }

    public function toggle()
    {
        if (is_null($this->published_at)) {
            $this->update([
                'published_at' => now()->toDateTimeString()
            ]);
        } else {
            $this->update([
                'published_at' => null
            ]);
        }
    }

    public function unpublish ()
    {
        $this->update(['status' => false]);
    }
}
