<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Database\Seeders\{BreedSeeder, SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Adoptions\Adoption, Breed, LostPets\LostPet, Pet, User};

class PetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class
        ]);
        $this->fakeEvent();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_belongs_to_user()
    {
        $pet = $this->create(Pet::class);

        $this->assertInstanceOf(User::class, $pet->user);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_belongs_to_breed()
    {
        $pet = $this->create(Pet::class);

        $this->assertInstanceOf(Breed::class, $pet->breed);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_has_one_adoption()
    {
        $pet = $this->create(Pet::class);
        $adoption = $this->create(Adoption::class, ['pet_id' => $pet->id]);

        $this->assertInstanceOf(Adoption::class, $pet->adoption);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function pet_has_one_lost_pet()
    {
        $pet = $this->create(Pet::class);
        $lostPet = $this->create(LostPet::class, ['pet_id' => $pet->id]);

        $this->assertInstanceOf(LostPet::class, $pet->lostPet);
    }
}
