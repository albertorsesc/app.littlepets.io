<?php

namespace Tests\Feature\Api\Veterinaries;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VeterinaryServicesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_veterinary_services()
    {
        $this->signIn();

        $response = $this->get(route('api.veterinary-services.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => config('littlepets.veterinary_services')
        ]);
    }
}
