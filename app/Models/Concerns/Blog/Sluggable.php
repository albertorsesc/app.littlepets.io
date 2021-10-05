<?php

namespace App\Models\Concerns\Blog;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable ()
    {
        static::creating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->title);
        });
        static::updating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->title);
        });
    }

    public static function findBySlug(string $slug): self
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    private function generateUniqueSlug(string $value): string
    {
        $slug = $originalSlug = Str::slug($value) ?: Str::random(5);
        $counter = 0;

        while ($this->slugExists($slug, $this->exists ? $this->id : null)) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }

        return $slug;
    }

    private function slugExists(string $slug, int $ignoreId = null): bool
    {
        $query = $this->where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }
}
