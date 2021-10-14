<?php

namespace Tests\Feature\Web\Blog\Articles;

use Tests\TestCase;
use Illuminate\Support\Arr;
use App\Models\Blog\Article;
use App\Models\Blog\BlogCategory;
use Database\Seeders\BlogCategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminArticlesTest extends TestCase
{
    use RefreshDatabase;

    private array $categories;
    private string $routePrefix = 'web.blog.admin.articles.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([BlogCategorySeeder::class]);
        $this->categories = BlogCategory::query()
                                        ->limit(3)
                                        ->pluck('id')
                                        ->toArray();
        $this->signIn([
            'email' => env('BLOG_EDITORS')
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authorized_user_can_visit_blog_article_index()
    {
        $response = $this->get(route($this->routePrefix . 'index'));
        $response->assertViewIs('blog.articles.admin.index');
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_blog_article_create()
    {
        $response = $this->get(route($this->routePrefix . 'create'));
        $response->assertViewIs('blog.articles.admin.create');

    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_create_a_blog_article()
    {
        $article = $this->make(Article::class);

        $response = $this->post(
            route($this->routePrefix . 'store'),
            array_merge($article->toArray(), [
                'categories' => $this->categories
            ])
        );
        $response->assertRedirect(route('web.blog.admin.articles.index'));

        $this->assertDatabaseHas('articles', Arr::except($article->toArray(), 'image'));
        $this->assertCount(3, Article::latest()->first()->categories);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_edit_blog_article()
    {
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
        $existingArticle = $this->create(Article::class);
        $newArticle = $this->make(Article::class);

        $response = $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            array_merge($newArticle->toArray(), [
                'categories' => $this->categories
            ])
        );
        $response->assertRedirect(route('web.blog.admin.articles.index', $existingArticle->fresh()));

        $this->assertDatabaseHas('articles', [
            'id' => $existingArticle->id,
            'title' => $newArticle->title,
            'slug' => $newArticle->slug,
            'excerpt' => $newArticle->excerpt,
            'body' => $newArticle->body,
        ]);
        $this->assertCount(3, $existingArticle->categories);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_delete_a_blog_article()
    {
        $existingArticle = $this->create(Article::class);
        $existingArticle->categories()->sync($this->categories);

        $response = $this->delete(route($this->routePrefix . 'destroy', $existingArticle));
        $response->assertRedirect(route('web.blog.admin.articles.index'));

        $this->assertDatabaseMissing('articles', $existingArticle->toArray());
        $this->assertDatabaseMissing('article_category', $existingArticle->categories->toArray());
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function unauthorized_user_cannot_visit_admin_routes()
    {
        $this->signIn();

        $this->get(
            route($this->routePrefix . 'index')
        )->assertForbidden();

        $this->get(
            route($this->routePrefix . 'create')
        )->assertForbidden();

        $this->post(
            route($this->routePrefix . 'store'),
            []
        )->assertForbidden();

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            []
        )->assertForbidden();

        $this->delete(
            route($this->routePrefix . 'destroy', $existingArticle),
        )->assertForbidden();
    }
}
