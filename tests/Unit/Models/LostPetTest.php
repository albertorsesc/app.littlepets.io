<?php

namespace Tests\Unit\Models;

use Tests\LostPetTestCase;
use Illuminate\Http\UploadedFile;
use Database\Seeders\{CountrySeeder, StateSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Concerns\CanBeReported, Concerns\Publishable, LostPets\LostPet, Comment, Location, Media, Pet};

class LostPetTest extends LostPetTestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class,
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function lost_pet_belongs_to_pet()
    {
        $this->fakeEvent();
        $lostPet = $this->create(LostPet::class);

        $this->assertInstanceOf(Pet::class, $lostPet->pet);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function lost_pet_morphs_to_many_comments()
    {
        $this->signIn();
        $lostPet = $this->create(LostPet::class);
        $lostPet->comment('Some body');

        $this->assertInstanceOf(Comment::class, $lostPet->comments->first());
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function lost_pet_has_one_location()
    {
        $this->signIn();

        $lostPet = $this->create(LostPet::class);
        $this->morphsTo(
            Location::class,
            $lostPet,
            'locationable'
        );

        $this->assertInstanceOf(Location::class, $lostPet->fresh()->location);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function lost_pet_uses_can_be_reported_trait()
    {
        $this->assertClassUsesTrait(
            CanBeReported::class,
            LostPet::class
        );
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function lost_pet_uses_publishable_trait()
    {
        $this->assertClassUsesTrait(
            Publishable::class,
            LostPet::class
        );
    }
}
