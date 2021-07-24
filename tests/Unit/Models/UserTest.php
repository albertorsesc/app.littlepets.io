<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\LostPets\LostPet;
use Database\Seeders\BreedSeeder;
use Database\Seeders\SpecieSeeder;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function user_has_many_through_adoptions()
    {
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class
        ]);
        $this->signIn();

        $this->create(Adoption::class);

        $this->assertInstanceOf(Adoption::class, auth()->user()->adoptions->first());
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function user_has_many_lost_pets()
    {
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class
        ]);
        $this->signIn();

        $this->create(LostPet::class);

        $this->assertInstanceOf(LostPet::class, auth()->user()->lostPets()->first());
    }
}
