<?php

namespace Tests\Unit\Http\Requests\Blog;

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

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(Article::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingArticle = $this->create(Article::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingArticle),
            $this->make(Article::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
