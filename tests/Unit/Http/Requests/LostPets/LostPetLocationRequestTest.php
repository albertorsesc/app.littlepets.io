<?php

namespace Tests\Unit\Http\Requests\LostPets;

use App\Models\Location;
use App\Models\LostPets\LostPet;
use Illuminate\Support\Str;
use Tests\LostPetTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\{CountrySeeder, StateSeeder};

class LostPetLocationRequestTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.lost-pets.location.';

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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->morphsTo(
                Location::class,
                $lostPet,
                'locationable',
                [$validatedField => $brokenRule],
                'make'
            )->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
            $this->morphsTo(
                Location::class,
                $lostPet,
                'locationable',
                [$validatedField => $brokenRule],
                'make'
            )->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     *   Required when owner: Because the owner of the lost pet should specified
     *   the area where the pet got lost.
     */
    public function neighborhood_is_required_when_post_type_is_owner()
    {
        $validatedField = 'neighborhood';
        $brokenRule = null;

        $lostPet = $this->create(LostPet::class, [], 'fromOwner');
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
            $this->make(Location::class, [
                $validatedField => $brokenRule
            ])->toArray()
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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
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

        $lostPet = $this->create(LostPet::class);
        $this->postJson(
            route($this->routePrefix . 'store', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $lostPet),
            $this->make(Location::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
