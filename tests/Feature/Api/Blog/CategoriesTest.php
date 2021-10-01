<?php

namespace Tests\Feature\Api\Blog;

use Tests\TestCase;
use App\Models\Blog\BlogCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.blog.categories.';

    /**
     * @test
     * @throws \Throwable
    */
    public function authorized_user_can_get_all_categories()
    {
        $this->signIn();

        $blogCategory = $this->create(BlogCategory::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
    }
}
