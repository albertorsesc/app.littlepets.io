<?php

namespace Tests\Unit\Http\Requests\Adoptions;

use Illuminate\Support\Str;
use Tests\AdoptionTestCase;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdoptionRequestTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.adoptions.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function breed_id_is_required()
    {
        $validatedField = 'breed_id';
        $brokenRule = null;
        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function breed_id_must_exist_in_breeds_table()
    {
        $validatedField = 'breed_id';
        $brokenRule = 19887324;

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function title_is_required()
    {
        $validatedField = 'title';
        $brokenRule = null;

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(Adoption::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->make(Adoption::class, [$validatedField => $brokenRule])->toArray()
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

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(Adoption::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->make(Adoption::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function name_is_required()
    {
        $validatedField = 'name';
        $brokenRule = null;

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function age_must_be_an_integer()
    {
        $validatedField = 'age';
        $brokenRule = 'not-age';

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function age_must_be_an_unsigned_integer()
    {
        $validatedField = 'age';
        $brokenRule = -1;

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function age_is_required_when_age_range_is_present()
    {
        $validatedField = 'age';
        $brokenRule = null;

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function age_range_is_required_when_age_is_present()
    {
        $validatedField = 'age_range';
        $brokenRule = null;

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function age_range_must_exist_in_adoption_age_ranges_constant_array()
    {
        $validatedField = 'age_range';
        $brokenRule = 'parsecs';

        $existingAdoption = $this->create(Adoption::class);
        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
        )->assertJsonValidationErrors($validatedField);

        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [$validatedField => $brokenRule])
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

        $adoption = $this->make(Adoption::class);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->getAdoptionData($adoption, [
                $validatedField => $brokenRule
            ])
        )->assertJsonValidationErrors($validatedField);

        $existingAdoption = $this->create(Adoption::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingAdoption),
            $this->getAdoptionData($adoption, [
                $validatedField => $brokenRule
            ])
        )->assertJsonValidationErrors($validatedField);
    }
}
