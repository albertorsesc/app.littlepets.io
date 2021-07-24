<?php

namespace Tests\Feature\Api\LostPets;

use Tests\Feature\HasPet;
use Tests\LostPetTestCase;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LostPetsTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.lost-pets.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_get_all_lost_pets()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $lostPet->id,
                    'pet' => ['id' => $lostPet->pet->id],
                    'postType' => $lostPet->post_type,
                    'description' => $lostPet->description,
                    'meta' => [
                        'profile' => $lostPet->profile(),
                        'publishedAt' => optional($lostPet->published_at)->diffForHumans(),
                        'lostAt' => optional($lostPet->lost_at)->diffForHumans(),
                        'foundAt' => optional($lostPet->found_at)->diffForHumans(),
                        'rescuedAt' => optional($lostPet->rescued_at)->diffForHumans(),
                        'updatedAt' => $lostPet->updated_at->diffForHumans(),
                    ]
                ]
            ]
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_store_a_lost_pet_as_owner()
    {
        $this->signIn();

        $lostPet = $this->make(LostPet::class, [], 'fromOwner');

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet)
        );
        $response->assertCreated();
        $response->assertJson(['description' => $lostPet->description]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_update_a_lost_pet()
    {
        $this->signIn();

        $existingLostPet = $this->create(LostPet::class);
        $newLostPet = $this->make(LostPet::class, ['pet_id' => $existingLostPet->pet_id]);

        $response = $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($newLostPet)
        );
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $existingLostPet->id,
                'title' => $newLostPet->title
            ]
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_delete_a_lost_pet()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);

        $this->deleteJson(
            route($this->routePrefix . 'destroy', $lostPet)
        )->assertStatus(204);

        $this->assertDatabaseMissing('lost_pets', $lostPet->toArray());
    }
}
