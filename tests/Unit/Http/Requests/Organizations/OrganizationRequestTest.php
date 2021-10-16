<?php

namespace Tests\Unit\Http\Requests\Organizations;

use App\Models\Team;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.organizations.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function name_is_required()
    {
        $validatedField = 'name';
        $brokenRule = null;
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function name_must_be_a_string()
    {
        $validatedField = 'name';
        $brokenRule = 999;
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function name_must_not_exceed_255_characters()
    {
        $validatedField = 'name';
        $brokenRule = Str::random(256);
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function type_is_required()
    {
        $validatedField = 'type';
        $brokenRule = null;
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function type_must_exist_in_configuration_key()
    {
        $validatedField = 'type';
        $brokenRule = 'not-valid-type';
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function capacity_is_required()
    {
        $validatedField = 'capacity';
        $brokenRule = null;
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function capacity_must_be_an_integer()
    {
        $validatedField = 'capacity';
        $brokenRule = 'non-integer';
        $lostPet = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
