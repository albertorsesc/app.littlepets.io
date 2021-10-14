<?php

namespace Tests\Unit\Models\Blog;

use Database\Seeders\BlogCategorySeeder;
use Tests\TestCase;
use App\Models\Blog\Article;
use App\Models\Blog\BlogCategory;
use App\Models\Concerns\Blog\Sluggable;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function article_belongs_to_many_blog_categories()
    {
        $this->loadSeeders([BlogCategorySeeder::class]);

        $article = $this->create(Article::class);
        $categories = BlogCategory::query()->inRandomOrder()->limit(3)->pluck('id')->toArray();

        $article->categories()->sync($categories);

        $this->assertDatabaseCount('article_category', 3);
    }
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
