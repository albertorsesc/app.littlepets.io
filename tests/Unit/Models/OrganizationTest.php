<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{Concerns\Publishable, Concerns\SerializeTimestamps, Concerns\Sluggable, Team, User};

class OrganizationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function team_model_belongs_to_its_owner()
    {
        $this->fakeEvent();
        $this->signIn();

        $organization = $this->create(Team::class);

        $this->assertInstanceOf(User::class, $organization->owner);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function organization_uses_publishable_trait()
    {
        $this->assertClassUsesTrait(
            Publishable::class,
            Team::class
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function organization_uses_sluggable_trait()
    {
        $this->assertClassUsesTrait(
            Sluggable::class,
            Team::class
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function organization_uses_serialize_timestamps_trait()
    {
        $this->assertClassUsesTrait(
            SerializeTimestamps::class,
            Team::class
        );
    }
}
