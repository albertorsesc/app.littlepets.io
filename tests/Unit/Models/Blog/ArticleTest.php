<?php

namespace Tests\Unit\Models\Blog;

use Tests\TestCase;
use App\Models\Blog\Article;
use App\Models\Concerns\Blog\Sluggable;

class ArticleTest extends TestCase
{
    /**
     * @test
     * @throws \Throwable
    */
    public function article_class_uses_sluggable_trait()
    {
        $this->assertClassUsesTrait(
            Sluggable::class,
            Article::class
        );
    }
}
