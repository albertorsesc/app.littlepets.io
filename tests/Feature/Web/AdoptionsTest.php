<?php

namespace Tests\Feature\Web;

use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\AdoptionTestCase;
use Tests\TestCase;

class AdoptionsTest extends AdoptionTestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_adoptions_view()
    {
        $this->signIn();

        $response = $this->get(
            route('web.adoptions.index')
        );
        $response->assertOk();
        $response->assertViewIs('adoptions.index');
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_an_adoption_profile()
    {
        $this->signIn();

        $adoption = $this->create(Adoption::class);

        $response = $this->get(
            route('web.adoptions.show', $adoption)
        );
        $response->assertOk();
        $response->assertViewIs('adoptions.show');
        $response->assertViewHas('adoption');
    }
}
