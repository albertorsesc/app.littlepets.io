<?php

namespace Tests\Unit\Models;

use Tests\AdoptionTestCase;
use Illuminate\Http\UploadedFile;
use Database\Seeders\{CountrySeeder, StateSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Comment, Concerns\CanBeReported, Concerns\Publishable, Location, Media, Pet, Adoptions\Adoption};

class AdoptionTest extends AdoptionTestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function adoption_belongs_to_pet()
    {
        $this->fakeEvent();
        $adoption = $this->create(Adoption::class);

        $this->assertInstanceOf(Pet::class, $adoption->pet);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function adoption_morphs_to_many_comments()
    {
        $this->signIn();
        $adoption = $this->create(Adoption::class);
        $adoption->comment('Some body');

        $this->assertInstanceOf(Comment::class, $adoption->comments->first());
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function adoption_has_one_location()
    {
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class,
        ]);
        $this->signIn();

        $adoption = $this->create(Adoption::class);
        $this->morphsTo(
            Location::class,
            $adoption,
            'locationable'
        );

        $this->assertInstanceOf(Location::class, $adoption->fresh()->location);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function adoption_model_must_use_can_be_reported_trait()
    {
        $this->assertClassUsesTrait(
            CanBeReported::class,
            Adoption::class
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function adoption_uses_publishable_trait()
    {
        $this->assertClassUsesTrait(
            Publishable::class,
            Adoption::class
        );
    }
}
