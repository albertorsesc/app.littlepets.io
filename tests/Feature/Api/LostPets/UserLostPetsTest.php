<?php

namespace Tests\Feature\Api\LostPets;

use Tests\LostPetTestCase;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLostPetsTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.user-lost-pets.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_get_own_lost_pets()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();

        $this->assertEquals($lostPet->pet->user->id, auth()->id());
    }
}
