<?php

namespace Tests\Feature\Api\Organizations;

use Tests\TestCase;
use App\Models\Organizations\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.organizations.';

    /**
     * @test
     */
    public function authenticated_user_can_get_all_organizations()
    {
        $this->signIn();

        $organization = $this->create(Organization::class);

        $response = $this->getJson(route($this->routePrefix.'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $organization->id,
                    'name' => $organization->name,
                    'phone' => $organization->phone,
                    'facebook_profile' => $organization->facebook_profile,
                    'about' => $organization->about,
                    'animal_capacity' => $organization->animal_capacity,
                ],
            ]
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */

    public function authenticated_user_can_store_an_organization()
    {
        $this->signIn();

        $organization = $this->make(Organization::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $organization->toArray()
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['name' => $organization->name]
        ]);
    }
}

