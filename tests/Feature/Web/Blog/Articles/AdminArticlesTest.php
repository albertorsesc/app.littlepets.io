<?php

namespace Tests\Feature\Web\Blog\Articles;

use Tests\TestCase;
use App\Models\Blog\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminArticlesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'web.blog.admin.articles.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_blog_article_index()
    {
        $this->signIn();

        $response = $this->get(route($this->routePrefix . 'index'));
        $response->assertViewIs('blog.articles.admin.index');

    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_blog_article_create()
    {
        $this->signIn();

        $response = $this->get(route($this->routePrefix . 'create'));
        $response->assertViewIs('blog.articles.admin.create');

    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_create_a_blog_article()
    {
        $this->signIn();

        $article = $this->make(Article::class);

        $response = $this->post(route($this->routePrefix . 'store'), $article->toArray());
        $response->assertRedirect(route('web.blog.admin.articles.index'));

        $this->assertDatabaseHas('articles', $article->toArray());
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_edit_blog_article()
    {
        $this->signIn();

        $article = $this->create(Article::class);

        $response = $this->get(route($this->routePrefix . 'edit', $article));
        $response->assertViewIs('blog.articles.admin.edit');
        $response->assertViewHas('article');
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_update_a_blog_article()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $existingArticle = $this->create(Article::class);
        $newArticle = $this->make(Article::class);

        $response = $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $newArticle->toArray()
        );
        $response->assertRedirect(route('web.blog.articles.show', $existingArticle));

        $this->assertDatabaseHas('articles', [
            'id' => $existingArticle->id,
            'title' => $newArticle->title,
            'slug' => $newArticle->slug,
            'excerpt' => $newArticle->excerpt,
            'body' => $newArticle->body,
        ]);
    }
}
