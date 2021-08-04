<?php

namespace Tests\Feature\Api\LostPets;

use Tests\LostPetTestCase;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LostPetCommentsTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.lost-pets.comments.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_comment_a_lost_pet()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            ['body' => 'Some comment']
        );
        $response->assertCreated();
        $comment = $lostPet->comments()->first();
        $response->assertJson([
            'data' => [
                'id' => $comment->id,
                'body' => $comment->body
            ]
        ]);

        $this->assertDatabaseHas('comments', [
            'commentable_type' => get_class($lostPet),
            'commentable_id' => $lostPet->id,
            'body' => 'Some comment'
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_update_a_comment_for_a_lost_pet()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);
        $comment = $lostPet->comment('Some Comment');

        $response = $this->putJson(
            route($this->routePrefix . 'update', [$lostPet, $comment]),
            ['body' => 'Another Comment']
        );
        $response->assertOk();

        $this->assertDatabaseHas('comments', [
            'commentable_type' => get_class($lostPet),
            'commentable_id' => $lostPet->id,
            'body' => 'Another Comment'
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_delete_a_lost_pet_comment()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);
        $comment = $lostPet->comment('Some Comment');

        $this->deleteJson(
            route($this->routePrefix . 'destroy', [$lostPet, $comment]),
        );

        $this->assertDatabaseMissing('comments', ['body' => $comment->body]);
    }
}
