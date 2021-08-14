<?php

namespace Tests\Feature\Api\LostPets\Actions;

use Database\Seeders\SpecieSeeder;
use Tests\TestCase;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarkPetAsFoundTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     * Owner/Rescuer: When owner founds he/she's pet.
    */
    public function authenticated_user_can_mark_a_lost_pet_as_found()
    {
        $this->loadSeeders([SpecieSeeder::class]);
        $this->signIn();
        $lostPet = $this->create(LostPet::class, [], 'published');

        $response = $this->putJson(
            route('api.lost-pets.found', $lostPet)
        );
        $response->assertOk();

        $this->assertEquals(now()->toDateTimeString(), $lostPet->fresh()->found_at);
    }
}
