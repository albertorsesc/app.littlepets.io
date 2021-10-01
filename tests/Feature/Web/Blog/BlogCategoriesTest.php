<?php

namespace Tests\Feature\Web\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function guest_user_can_visit_blog_categories_view()
    {
        $response = $this->get(
            route('web.blog.categories.index')
        );
        $response->assertViewIs('blog.categories.index');
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_an_adoption_profile()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);

        $response = $this->get(
            route('web.adoptions.show', $adoption)
        );
        $response->assertOk();
        $response->assertViewIs('adoptions.show');
        $response->assertViewHas('adoption');
    }
}
