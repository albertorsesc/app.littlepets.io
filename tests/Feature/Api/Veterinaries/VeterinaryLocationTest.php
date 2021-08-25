<?php

namespace Tests\Feature\Api\Veterinaries;

use App\Models\Location;
use App\Models\Veterinaries\Veterinary;
use Database\Seeders\CountrySeeder;
use Database\Seeders\StateSeeder;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VeterinaryLocationTest extends TestCase
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
     * @endpoint ['POST' => '/api/veterinaries/{veterinary}/location']
     */
    public function store_an_veterinary_location()
    {
        $veterinary = $this->create(Veterinary::class);
        $veterinaryLocation = $this->morphsTo(
            Location::class,
            $veterinary,
            'locationable',
            [],
            'make'
        );

        $response = $this->postJson(
            route('api.veterinaries.location.store', $veterinary),
            Arr::except($veterinaryLocation->toArray(), [
                'locationable_id', 'locationable_type'
            ])
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => [
                'address' => $veterinary->fresh()->location->address
            ]
        ]);

        $this->assertDatabaseHas(
            'locations',
            Arr::except($veterinary->fresh()->location->toArray(), 'coordinates')
        );
    }

    /**
     * @test
     * @throws \Throwable
     * @endpoint ['PUT' => '/api/veterinaries/locations/{location}']
     */
    public function update_an_veterinary_location()
    {
        $veterinary = $this->create(Veterinary::class);
        $veterinaryLocation = $this->morphsTo(
            Location::class,
            $veterinary,
            'locationable',
        );
        $veterinaryLocationData = $this->morphsTo(
            Location::class,
            $veterinary,
            'locationable',
            [],
            'make'
        );

        $response = $this->putJson(
            route('api.veterinaries.location.update', $veterinary),
            Arr::except($veterinaryLocationData->toArray(), [
                'locationable_id', 'locationable_type'
            ])
        );
        $response->assertOk();
        $response->assertJson(['data' => ['address' => $veterinaryLocationData->address]]);

        $this->assertDatabaseHas('locations',  Arr::except($veterinary->fresh()->location->toArray(), 'coordinates'));
    }
}
