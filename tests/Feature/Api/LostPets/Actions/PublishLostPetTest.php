<?php

namespace Tests\Feature\Api\LostPets\Actions;

use Tests\LostPetTestCase;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishLostPetTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.lost-pets.';

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['PUT', '/api/adoptions/{adoption}/toggle']
     */
    public function authenticated_user_can_publish_a_lost_pets()
    {
        $this->signIn();

        $adoption = $this->create(LostPet::class, ['published_at' => null]);
        $this->assertNull($adoption->published_at);

        $this->putJson(route($this->routePrefix . 'toggle', $adoption));
        $this->assertEquals(
            $adoption->fresh()->published_at,
            now()->toDateTimeString()
        );

        $this->putJson(route($this->routePrefix . 'toggle',  $adoption));
        $this->assertNull($adoption->fresh()->published_at);
    }
}
