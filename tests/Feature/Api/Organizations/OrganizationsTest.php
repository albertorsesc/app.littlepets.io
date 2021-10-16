<?php

namespace Tests\Feature\Api\Organizations;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_organizations()
    {
        $this->signIn();

        $organization = $this->create(Team::class);

        $response = $this->getJson(route('api.organizations.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $organization->id,
                    'name' => $organization->name,
                    'type' => $organization->type,
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function authenticated_user_can_store_an_organization()
    {
        $this->signIn();

        $organization = $this->make(Team::class, [
            'user_id' => auth()->id()
        ]);

        $response = $this->postJson(
            route('api.organizations.store'),
            $organization->toArray()
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['name' => $organization->name]
        ]);

        $this->assertDatabaseHas('teams', $organization->toArray());
    }

    /**
     * @test
     */
    public function authenticated_user_can_update_an_organization()
    {
        $this->signIn();

        $existingOrganization = $this->create(Team::class);
        $newOrganization = $this->make(Team::class, [
            'user_id' => $existingOrganization->owner->id
        ]);

        $response = $this->putJson(
            route('api.organizations.update', $existingOrganization),
            $newOrganization->toArray()
        );
        $response->assertOk();
        $response->assertJson([
            'data' => ['name' => $newOrganization->name]
        ]);

        $this->assertDatabaseHas('teams', [
            'id' => $existingOrganization->id,
            'name' => $newOrganization->name,
        ]);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_delete_an_organization()
    {
        $this->signIn();

        $organization = $this->create(Team::class);

        $this->deleteJson(
            route('api.organizations.destroy', $organization)
        )->assertStatus(204);

        $this->assertDatabaseMissing('teams', $organization->toArray());
    }
}

