<?php

namespace Tests\Feature\Api\Veterinaries\Actions;

use Tests\TestCase;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CanBeLikedTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.veterinaries.likes.';

    /**
     * @test
     * @throws \Throwable
     * @only ['auth']
     */
    public function veterinary_can_be_liked()
    {
        $this->signIn();
        $veterinary = $this->create(Veterinary::class);
        $this->signOut();

        $this->signIn();

        $response = $this->postJson(route($this->routePrefix . 'store', $veterinary));
        $response->assertOk();

        $this->assertCount(1, $veterinary->fresh()->likes);
    }

    /**
     * @test
     * @throws \Throwable
     * @only ['auth']
     */
    public function veterinary_cannot_be_liked_twice_by_same_user_and_will_remove_current_like()
    {
        $this->signIn();
        $veterinary = $this->create(Veterinary::class);
        $this->signOut();

        $this->signIn();

        $veterinary->liked();
        $this->assertCount(1, $veterinary->fresh()->likes);

        $veterinary->liked();
        $this->assertCount(0, $veterinary->fresh()->likes);

        $veterinary->liked();
        $this->assertCount(1, $veterinary->fresh()->likes);
    }

    /**
     * @test
     * @throws \Throwable
     * @only ['auth']
     */
    public function veterinary_can_disliked()
    {
        $this->signIn();
        $veterinary = $this->create(Veterinary::class);
        $this->signOut();

        $this->signIn();

        $response = $this->deleteJson(route($this->routePrefix . 'destroy', $veterinary));
        $response->assertOk();

        $this->assertCount(1, $veterinary->fresh()->likes()->where('liked', false)->get());

    }

    /**
     * @test
     * @throws \Throwable
     * @only ['auth']
     */
    public function veterinary_cannot_be_disliked_twice_and_will_remove_current_dislike()
    {
        $this->signIn();
        $veterinary = $this->create(Veterinary::class);
        $this->signOut();

        $this->signIn();

        $veterinary->disliked();
        $this->assertCount(1, $veterinary->fresh()->likes()->where('liked', false)->get());

        $veterinary->disliked();
        $this->assertCount(0, $veterinary->fresh()->likes()->where('liked', false)->get());
    }

    /**
     * @test
     * @throws \Throwable
     * @only ['auth']
     */
    public function one_like_removes_a_dislike_and_vice_versa()
    {
        $this->signIn();
        $veterinary = $this->create(Veterinary::class);
        $this->signOut();

        $this->signIn();

        $veterinary->liked();
        $this->assertCount(1, $veterinary->fresh()->likes()->where('liked', true)->get());

        $veterinary->disliked();
        $this->assertCount(1, $veterinary->fresh()->likes()->where('liked', false)->get());

        $veterinary->liked();
        $this->assertCount(1, $veterinary->fresh()->likes()->where('liked', true)->get());

        $veterinary->disliked();
        $this->assertCount(1, $veterinary->fresh()->likes()->where('liked', false)->get());

        $veterinary->disliked();
        $this->assertCount(0, $veterinary->fresh()->likes);
    }
}
