<?php

namespace Tests\Feature\Web\Blog\Articles;

use App\Models\Blog\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'web.blog.articles.';

    /**
     * @test
     * @throws \Throwable
     */
    public function guest_user_can_visit_blog_article_profile()
    {
        $this->signIn();

        $article = $this->create(Article::class);

        $response = $this->get(route($this->routePrefix . 'show', $article));
        $response->assertViewIs('blog.articles.show');
        $response->assertViewHas('article');
    }
}
