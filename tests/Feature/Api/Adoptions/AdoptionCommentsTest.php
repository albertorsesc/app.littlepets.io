<?php

namespace Tests\Feature\Api\Adoptions;

use Tests\AdoptionTestCase;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdoptionCommentsTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.comments.';

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_comment_an_adoption()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store', $adoption),
            ['body' => 'Some comment']
        );
        $response->assertCreated();
        $comment = $adoption->comments()->first();
        $response->assertJson([
            'data' => [
                'id' => $comment->id,
                'body' => $comment->body
            ]
        ]);

        $this->assertDatabaseHas('comments', [
            'commentable_type' => get_class($adoption),
            'commentable_id' => $adoption->id,
            'body' => 'Some comment'
        ]);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_update_a_comment()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);
        $comment = $adoption->comment('Some Comment');

        $response = $this->putJson(
            route($this->routePrefix . 'update', [$adoption, $comment]),
            ['body' => 'Another Comment']
        );
        $response->assertOk();

        $this->assertDatabaseHas('comments', [
            'commentable_type' => get_class($adoption),
            'commentable_id' => $adoption->id,
            'body' => 'Another Comment'
        ]);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_delete_an_adoption_comment()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);
        $comment = $adoption->comment('Some Comment');

        $this->deleteJson(
            route($this->routePrefix . 'destroy', [$adoption, $comment]),
        );

        $this->assertDatabaseMissing('comments', ['body' => $comment->body]);
    }
}
