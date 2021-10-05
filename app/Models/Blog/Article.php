<?php

namespace App\Models\Blog;

use App\Models\Concerns\Blog\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'body'];

    public function getRouteKeyName() : string
    {
        return 'slug';
    }
}
