<?php

namespace Tests\Feature\Api\Organizations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizationTypesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_organization_types()
    {
        $this->signIn();

        $response = $this->getJson(route('api.organizations.types.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => collect(
                config('littlepets.organizations.types')
            )->toArray()
        ]);
    }
}
