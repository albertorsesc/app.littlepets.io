<?php

namespace Tests\Unit\Http\Requests\Blog;

use App\Models\Blog\BlogCategory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogCategoryRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'web.blog.admin.categories.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn([
            'email' => implode(',', config('littlepets.roles.root'))
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function name_is_required()
    {
        $validatedField = 'name';
        $brokenRule = null;

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(BlogCategory::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function display_name_is_required()
    {
        $validatedField = 'display_name';
        $brokenRule = null;

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(BlogCategory::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
