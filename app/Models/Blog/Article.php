<?php

namespace App\Models\Blog;

use App\Models\Concerns\Blog\Sluggable;
use App\Models\Concerns\HandlesMedia;
use App\Models\Concerns\Publishable;
use App\Models\Concerns\SerializeTimestamps;
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
    use SerializeTimestamps;

    protected $casts = ['published_at' => 'datetime:Y-m-d H:i:s'];
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'image', 'published_at'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
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

    public function publish()
    {
        if (! request('is_published')) {
            $this->update(['published_at' => null]);
        } elseif (is_null($this->published_at)) {
            $this->update(['published_at' => now()->toDateTimeString()]);
        }
    }

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
