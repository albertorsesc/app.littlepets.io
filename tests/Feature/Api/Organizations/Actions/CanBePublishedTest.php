<?php

namespace Tests\Feature\Api\Organizations\Actions;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CanBePublishedTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.organizations.';

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['PUT', '/api/organizations/{team}/toggle']
     */
    public function authenticated_user_can_publish_an_organization()
    {
        $this->signIn();

        $organization = $this->create(Team::class, ['published_at' => null]);
        $this->assertNull($organization->published_at);

        $this->putJson(route($this->routePrefix . 'toggle', $organization));
        $this->assertEquals(
            $organization->fresh()->published_at,
            now()->toDateTimeString()
        );

        $this->putJson(route($this->routePrefix . 'toggle',  $organization));
        $this->assertNull($organization->fresh()->published_at);
    }
}
