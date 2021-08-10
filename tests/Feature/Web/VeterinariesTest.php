<?php

namespace Tests\Feature\Web;

use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VeterinariesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_veterinaries_view()
    {
        $this->signIn();

        $response = $this->get(
            route('web.veterinaries.index')
        );
        $response->assertOk();
        $response->assertViewIs('veterinaries.index');
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_a_veterinary_profile()
    {
        $this->signIn();

        $veterinary = $this->create(Veterinary::class);

        $response = $this->get(
            route('web.veterinaries.show', $veterinary)
        );
        $response->assertOk();
        $response->assertViewIs('veterinaries.show');
        $response->assertViewHas('veterinary');
    }
}
