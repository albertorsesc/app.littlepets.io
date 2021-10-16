<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{Team, User};
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function team_model_belongs_to_its_owner()
    {
        $this->signIn();

        $organization = $this->create(Team::class);

        $this->assertInstanceOf(User::class, $organization->owner);
    }
}
