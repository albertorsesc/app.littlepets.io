<?php

namespace Tests\Feature\Api\LostPets;

use Tests\TestCase;
use App\Models\LostPets\LostPet;
use Database\Seeders\{BreedSeeder, SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLostPetsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.user-lost-pets.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class
        ]);
    }

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
