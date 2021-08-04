<?php

namespace Tests\Feature\Api\LostPets;

use App\Models\Location;
use Tests\LostPetTestCase;
use Illuminate\Support\Arr;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\{StateSeeder, CountrySeeder};

class LostPetLocationTest extends LostPetTestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     * @endpoint ['POST' => '/api/lost-pets/{lostPet}/location']
     */
    public function store_a_lost_pet_location()
    {
        $lostPet = $this->create(LostPet::class);
        $lostPetLocation = $this->morphsTo(
            Location::class,
            $lostPet,
            'locationable',
            [],
            'make'
        );

        $response = $this->postJson(
            route('api.lost-pets.location.store', $lostPet),
            Arr::except($lostPetLocation->toArray(), [
                'locationable_id', 'locationable_type'
            ])
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => [
                'address' => $lostPet->fresh()->location->address
            ]
        ]);

        $this->assertDatabaseHas(
            'locations',
            Arr::except(
                $lostPet->fresh()->location->toArray(),
                'coordinates'
            )
        );
    }

    /**
     * @test
     * @throws \Throwable
     * @endpoint ['PUT' => '/api/lost-pets/locations/{location}']
     */
    public function update_an_lostPet_location()
    {
        $lostPet = $this->create(LostPet::class);
        $lostPetLocation = $this->morphsTo(
            Location::class,
            $lostPet,
            'locationable',
        );
        $lostPetLocationData = $this->morphsTo(
            Location::class,
            $lostPet,
            'locationable',
            [],
            'make'
        );

        $response = $this->putJson(
            route('api.lost-pets.location.update', $lostPet),
            Arr::except($lostPetLocationData->toArray(), [
                'locationable_id', 'locationable_type'
            ])
        );
        $response->assertOk();
        $response->assertJson(['data' => [
            'address' => $lostPetLocationData->address
        ]]);

        $this->assertDatabaseHas(
            'locations',
            Arr::except(
                $lostPet->fresh()->location->toArray(),
                'coordinates'
            )
        );
    }
}
