<?php

namespace Tests\Feature\Web\Organizations;

use App\Models\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_organizations_index_view()
    {
        $this->signIn();

        $response = $this->get(route('web.organizations.index'));
        $response->assertOk();
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_an_organization_profile()
    {
        $this->fakeEvent();
        $this->signIn();

        $organization = $this->create(Team::class);

        $response = $this->get(route('web.organizations.show', $organization));
        $response->assertOk();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_an_organization_settings()
    {
        $this->fakeEvent();
        $this->signIn();

        $organization = $this->create(Team::class);

        $response = $this->get(route('web.organizations.settings', $organization));
        $response->assertOk();
        $response->assertViewIs('organizations.settings');
    }
}
