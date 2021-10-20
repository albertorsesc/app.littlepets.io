<?php

namespace Tests\Feature\Api\Organizations\Actions;

use Tests\TestCase;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VerifyOrganizationTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.organizations.';

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['PUT', '/api/organizations/{team}/verify']
     */
    public function authenticated_user_can_verify_an_organization()
    {
        $this->signIn();

        $organization = $this->create(Team::class, ['verified_at' => null]);
        $this->assertNull($organization->verified_at);

        $this->putJson(route($this->routePrefix . 'verify', $organization));
        $this->assertEquals(
            $organization->fresh()->verified_at->toDateTimeString(),
            now()->toDateTimeString()
        );
    }
}
