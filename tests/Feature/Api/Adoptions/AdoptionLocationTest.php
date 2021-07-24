<?php

namespace Tests\Feature\Api\Adoptions;

use App\Models\Location;
use Database\Seeders\CountrySeeder;
use Database\Seeders\StateSeeder;
use Illuminate\Support\Arr;
use Tests\AdoptionTestCase;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdoptionLocationTest extends AdoptionTestCase
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
     * @endpoint ['POST' => '/api/adoptions/{adoption}/location']
     */
    public function store_an_adoption_location()
    {
        $adoption = $this->create(Adoption::class);
        $adoptionLocation = $this->morphsTo(
            Location::class,
            $adoption,
            'locationable',
            [],
            'make'
        );

        $response = $this->postJson(
            route('api.adoptions.location.store', $adoption),
            Arr::except($adoptionLocation->toArray(), [
                'locationable_id', 'locationable_type'
            ])
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => [
                'address' => $adoption->fresh()->location->address
            ]
        ]);

        $this->assertDatabaseHas(
            'locations',
            Arr::except($adoption->fresh()->location->toArray(), 'coordinates')
        );
    }

    /**
     * @test
     * @throws \Throwable
     * @endpoint ['PUT' => '/api/adoptions/locations/{location}']
     */
    public function update_an_adoption_location()
    {
        $adoption = $this->create(Adoption::class);
        $adoptionLocation = $this->morphsTo(
            Location::class,
            $adoption,
            'locationable',
        );
        $adoptionLocationData = $this->morphsTo(
            Location::class,
            $adoption,
            'locationable',
            [],
            'make'
        );

        $response = $this->putJson(
            route('api.adoptions.location.update', $adoption),
            Arr::except($adoptionLocationData->toArray(), [
                'locationable_id', 'locationable_type'
            ])
        );
        $response->assertOk();
        $response->assertJson(['data' => ['address' => $adoptionLocationData->address]]);

        $this->assertDatabaseHas('locations',  Arr::except($adoption->fresh()->location->toArray(), 'coordinates'));
    }
}
