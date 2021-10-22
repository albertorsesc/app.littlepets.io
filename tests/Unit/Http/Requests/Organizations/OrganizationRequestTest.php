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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function name_must_be_unique()
    {
        $this->fakeEvent();
        $existingOrganization = $this->create(Team::class);
        $validatedField = 'name';
        $brokenRule = $existingOrganization->name;
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function capacity_must_not_exceed_200()
    {
        $validatedField = 'capacity';
        $brokenRule = 201;
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function phone_is_required()
    {
        $validatedField = 'phone';
        $brokenRule = null;
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function phone_must_not_exceed_50_characters()
    {
        $validatedField = 'phone';
        $brokenRule = Str::random(51);
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function email_must_not_exceed_150_characters()
    {
        $validatedField = 'email';
        $brokenRule = Str::random(145) . '@email.com';
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function email_must_have_a_valid_format()
    {
        $validatedField = 'email';
        $brokenRule = Str::random(10) . '@';
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function facebook_profile_must_not_exceed_255_characters()
    {
        $validatedField = 'facebook_profile';
        $brokenRule = Str::random(256);
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function facebook_profile_must_have_a_valid_url_format()
    {
        $validatedField = 'facebook_profile';
        $brokenRule = 'not-url.com';
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function site_must_not_exceed_255_characters()
    {
        $validatedField = 'site';
        $brokenRule = Str::random(256);
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
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
    public function site_must_have_a_valid_url_format()
    {
        $validatedField = 'site';
        $brokenRule = 'not-url.com';
        $organization = $this->make(Team::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingTeam = $this->create(Team::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingTeam),
            $this->make(Team::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
