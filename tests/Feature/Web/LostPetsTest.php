<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use App\Models\LostPets\LostPet;
use Database\Seeders\BreedSeeder;
use Database\Seeders\SpecieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LostPetsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_lost_pets_view()
    {
        $this->signIn();

        $response = $this->get(route('web.lost-pets.index'));
        $response->assertViewIs('lost-pets.index');
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_a_lost_pet_profile()
    {
        $this->loadSeeders([
            SpecieSeeder::class,
        ]);
        $this->signIn();

        $lostPet = $this->create(LostPet::class);

        $response = $this->get(route('web.lost-pets.show', $lostPet));
        $response->assertViewIs('lost-pets.show');
        $response->assertViewHas('lostPet');
    }
}
