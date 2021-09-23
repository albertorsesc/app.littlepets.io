<?php

namespace Tests\Unit\Http\Requests\Organizations;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\Organizations\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationRequestTest extends TestCase
{

    use RefreshDatabase;

    private string $routePrefix = 'api.organizations.';

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function name_is_required()
    {
        $validatedField = 'name';
        $brokenRule = null;
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function name_must_not_exceed_255_characters()
    {
        $validatedField = 'name';
        $brokenRule = Str::random(256);
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function phone_is_required()
    {
        $validatedField = 'phone';
        $brokenRule = null;
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function phone_must_not_exceed_50_characters()
    {
        $validatedField = 'phone';
        $brokenRule = Str::random(51);
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function facebook_profile_must_not_exceed_255_characters()
    {
        $validatedField = 'facebook_profile';
        $brokenRule = Str::random(256);
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function about_must_not_exceed_255_characters()
    {
        $validatedField = 'about';
        $brokenRule = Str::random(256);
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function animal_capacity_must_be_greater_than_0()
    {
        $validatedField = 'animal_capacity';
        $brokenRule = 0;
        $organization = $this->make(Organization::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
