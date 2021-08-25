<?php

namespace Tests\Unit\Http\Requests\Veterinaries;

use App\Models\Location;
use App\Models\Veterinaries\Veterinary;
use Database\Seeders\CountrySeeder;
use Database\Seeders\StateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class VeterinaryLocationRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.veterinaries.location.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class
        ]);
        $this->signIn();
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function address_must_not_exceed_255_characters()
    {
        $validatedField = 'address';
        $brokenRule = Str::random(256);

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->morphsTo(
                Location::class,
                $property,
                'locationable',
                [$validatedField => $brokenRule],
                'make'
            )->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->morphsTo(
                Location::class,
                $property,
                'locationable',
                [$validatedField => $brokenRule],
                'make'
            )->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function neighborhood_must_not_exceed_255_characters()
    {
        $validatedField = 'neighborhood';
        $brokenRule = Str::random(256);

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function city_is_required()
    {
        $validatedField = 'city';
        $brokenRule = null;

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function city_must_not_exceed_255_characters()
    {
        $validatedField = 'city';
        $brokenRule = Str::random(256);

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function state_id_is_required()
    {
        $validatedField = 'state_id';
        $brokenRule = null;

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function state_id_must_exist_in_states_table()
    {
        $validatedField = 'state_id';
        $brokenRule = 10001;

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function zip_code_must_not_exceed_20_characters()
    {
        $validatedField = 'zip_code';
        $brokenRule = Str::random(21);

        $property = $this->create(Veterinary::class);
        $this->postJson(
            route($this->routePrefix . 'store', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $property),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
