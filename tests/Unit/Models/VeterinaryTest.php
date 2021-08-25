<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Like;
use App\Models\Location;
use App\Models\Veterinaries\Veterinary;
use Database\Seeders\{CountrySeeder, StateSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Concerns\{Publishable, CanBeReported};

class VeterinaryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
    */
    public function veterinary_belongs_to_user()
    {
        $this->signIn();
        $veterinary = $this->create(Veterinary::class);

        $this->assertInstanceOf(User::class, $veterinary->user);
    }

    /**
     * @test
    */
    public function veterinary_has_one_user()
    {
        $this->signIn();
        $this->create(Veterinary::class);

        $this->assertInstanceOf(
            Veterinary::class,
            auth()->user()->veterinaries->first()
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function veterinary_has_one_location()
    {
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class,
        ]);
        $this->signIn();

        $veterinary = $this->create(Veterinary::class);
        $this->morphsTo(
            Location::class,
            $veterinary,
            'locationable'
        );

        $this->assertInstanceOf(Location::class, $veterinary->fresh()->location);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function veterinary_model_must_use_can_be_reported_trait()
    {
        $this->assertClassUsesTrait(
            CanBeReported::class,
            Veterinary::class
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function veterinary_model_must_use_publishable()
    {
        $this->assertClassUsesTrait(
            Publishable::class,
            Veterinary::class
        );
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function veterinary_morph_many_likes()
    {
        $this->signIn();

        $veterinary = $this->create(Veterinary::class);

        $veterinary->liked();
        $this->assertInstanceOf(Like::class, $veterinary->fresh()->likes->first());
    }
}
