<?php

namespace Tests\Unit\Http\Requests\LostPets;

use Tests\LostPetTestCase;
use Illuminate\Support\Str;
use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LostPetRequestTest extends LostPetTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.lost-pets.';

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
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function name_must_not_exceed_100_characters()
    {
        $validatedField = 'name';
        $brokenRule = Str::random(101);
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function title_must_not_exceed_50_characters()
    {
        $validatedField = 'title';
        $brokenRule = Str::random(51);
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData(
                LostPet::factory()->make(),
                [$validatedField => $brokenRule]
            )
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData(
                LostPet::factory()->make(),
                [$validatedField => $brokenRule]
            )
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function gender_is_required()
    {
        $validatedField = 'gender';
        $brokenRule = null;
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function gender_must_exist_in_config_genders_array()
    {
        $validatedField = 'gender';
        $brokenRule = 'whatever';
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function size_is_required()
    {
        $validatedField = 'size';
        $brokenRule = null;
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function size_must_exist_in_adoption_sizes_constant_array()
    {
        $validatedField = 'size';
        $brokenRule = 'whatever';
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function size_must_not_exceed_50_characters()
    {
        $validatedField = 'size';
        $brokenRule = Str::random(51);
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function age_must_not_exceed_the_number_30()
    {
        $validatedField = 'age';
        $brokenRule = 31;
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function lost_at_is_required_if_post_type_is_owner()
    {
        $validatedField = 'lost_at';
        $brokenRule = null;
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [
                'post_type' => 'owner',
                $validatedField => $brokenRule
            ])
        )->assertJsonValidationErrors($validatedField);

        $existingLostPet = $this->create(LostPet::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingLostPet),
            $this->getLostPetData($lostPet, [
                'post_type' => 'owner',
                $validatedField => $brokenRule
            ])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function rescued_at_is_required_if_post_type_is_rescuer()
    {
        $validatedField = 'rescued_at';
        $brokenRule = null;
        $lostPet = $this->make(LostPet::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getLostPetData($lostPet, [
                'post_type' => LostPet::POST_TYPES[1],
                $validatedField => $brokenRule
            ])
        )->assertJsonValidationErrors($validatedField);

//        $existingLostPet = $this->create(LostPet::class);
//        $this->putJson(
//            route($this->routePrefix . 'update', $existingLostPet),
//            $this->getLostPetData($lostPet, [
//                'post_type' => 'rescuer',
//                $validatedField => $brokenRule
//            ])
//        )->assertJsonValidationErrors($validatedField);
    }
}
