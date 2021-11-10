<?php

namespace Tests\Unit\Http\Requests\Blog;

use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Blog\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'web.blog.admin.articles.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn([
            'email' => env('BLOG_EDITORS')
        ]);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function title_is_required()
    {
        $validatedField = 'title';
        $brokenRule = null;

        $this->post(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertSessionHasErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertSessionHasErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function title_must_not_exceed_255_characters()
    {
        $validatedField = 'title';
        $brokenRule = Str::random(256);

        $this->post(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertSessionHasErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertSessionHasErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function categories_is_required()
    {
        $validatedField = 'categories';
        $brokenRule = [];

        $this->post(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertSessionHasErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertSessionHasErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function excerpt_is_required()
    {
        $validatedField = 'excerpt';
        $brokenRule = [];

        $this->post(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertSessionHasErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertSessionHasErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function excerpt_must_not_exceed_255_characters()
    {
        $validatedField = 'excerpt';
        $brokenRule = Str::random(256);

        $this->post(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertSessionHasErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertSessionHasErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function body_is_required()
    {
        $validatedField = 'body';
        $brokenRule = [];

        $this->post(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertSessionHasErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->put(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertSessionHasErrors($validatedField);
    }
}
