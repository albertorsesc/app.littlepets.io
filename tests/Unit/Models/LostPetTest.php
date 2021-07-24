<?php

namespace Tests\Unit\Models;

use App\Models\Pet;
use Tests\TestCase;
use App\Models\LostPets\LostPet;
use Illuminate\Support\Facades\Event;
use Database\Seeders\{BreedSeeder, SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;

class LostPetTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class
        ]);
        Event::fake();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function lost_pet_belongs_to_pet()
    {
        $this->fakeEvent();
        $lostPet = $this->create(LostPet::class);

        $this->assertInstanceOf(Pet::class, $lostPet->pet);
    }
}
