<?php

namespace Tests\Unit\Http\Requests\Veterinaries;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VeterinaryRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.veterinaries.';

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
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [
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
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function services_is_required()
    {
        $validatedField = 'services';
        $brokenRule = null;
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function services_must_be_an_array()
    {
        $validatedField = 'services';
        $brokenRule = 'Consulta';
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function services_must_exist_in_services_config()
    {
        $validatedField = 'services';
        $brokenRule = ['No en consulta'];
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function specialty_must_not_exceed_255_characters()
    {
        $validatedField = 'specialty';
        $brokenRule = Str::random(256);
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
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
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [
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
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function email_must_not_exceed_100_characters()
    {
        $validatedField = 'email';
        $brokenRule = Str::random(101);
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function email_must_have_a_valid_format()
    {
        $validatedField = 'email';
        $brokenRule = Str::random(10);
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
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
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
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
        $lostPet = $this->make(Veterinary::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $lostPet->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingVeterinary = $this->create(Veterinary::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingVeterinary),
            $this->make(Veterinary::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
