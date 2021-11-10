<?php

namespace Tests\Feature\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function guest_cant_access_dashboard()
    {
        $this->get(
            route('home')
        )->assertRedirect(route('login'));
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_dashboard()
    {
        $this->signIn();

        $response = $this->get(
            route('home')
        );
        $response->assertViewIs('dashboard');
    }
}
