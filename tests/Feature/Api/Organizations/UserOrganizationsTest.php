<?php

namespace Tests\Feature\Api\Organizations;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserOrganizationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_own_organization()
    {
        $this->signIn();

        $organization = $this->make(Team::class);

        $this->postJson(
            route('api.organizations.store'), $organization->toArray()
        )->assertCreated();

        $response = $this->getJson(route('api.user.organizations.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => auth()->user()->currentTeam->id,
                'owner' => ['id' => auth()->id()]
            ]
        ]);
    }
}
