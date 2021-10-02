<?php

namespace Tests\Feature\Web\Blog;

use App\Models\Blog\BlogCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogCategoriesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'web.blog.categories.';

    /**
     * @test
     * @throws \Throwable
     */
    public function guest_user_cannot_visit_blog_categories_view()
    {
        $response = $this->get(
            route($this->routePrefix . 'index')
        )->assertRedirect('login');
    }

    public function authenticated_user_can_visit_an_blog_profile()
    {
        $this->signIn();

        $blog = $this->create(BlogCategory::class);

        $response = $this->get(
            route('web.blog.show', $blog)
        );
        $response->assertOk();
        $response->assertViewIs('blog.show');
        $response->assertViewHas('blog');
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_create_a_blog_category()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $category = $this->make(BlogCategory::class);

        $response = $this->post(route($this->routePrefix . 'store'), $category->toArray());
        $response->assertRedirect(route('web.blog.categories.index'));
    }
}
