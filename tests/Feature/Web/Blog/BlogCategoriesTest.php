<?php

namespace Tests\Feature\Web\Blog;

use App\Models\Blog\BlogCategory;
use Database\Seeders\BlogCategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogCategoriesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'web.blog.admin.categories.';

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

    /**
     * @test
     * @throws \Throwable
     * @only ['root']
     */
    public function authorized_user_can_create_a_blog_category()
    {
        $this->signIn([
            'email' => implode(',', config('littlepets.roles.root'))
        ]);

        $category = $this->make(BlogCategory::class);

        $response = $this->post(route($this->routePrefix . 'store'), $category->toArray());
        $this->assertDatabaseHas('blog_categories', $category->toArray());
        $response->assertRedirect(route('web.blog.admin.categories.index'));
    }
}
