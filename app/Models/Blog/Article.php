<?php

namespace App\Models\Blog;

use App\Models\Concerns\Blog\Sluggable;
use App\Models\Concerns\HandlesMedia;
use App\Models\Concerns\Publishable;
use App\Models\Concerns\Shareable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use Sluggable;
    use Shareable;
    use HasFactory;
    use Publishable;
    use HandlesMedia;

    protected $casts = ['published_at' => 'datetime:Y-m-d H:i:s'];
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'image', 'published_at'];

    protected static function boot ()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->published_at = request('published_at') ? now()->toDateTimeString() : null;
        });
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    /* Relationships */

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(
            BlogCategory::class,
            'article_category',
            'article_id',
            'blog_category_id'
        );
    }

    /* Helpers */

    public function profile() : string
    {
        return route('web.blog.articles.show', $this);
    }

    public function readTime()
    {
        $minutes = round(str_word_count($this->body) / 200);

        return $minutes == 0 ? 1 : $minutes;
    }
}
