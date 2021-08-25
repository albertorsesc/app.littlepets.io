<?php

namespace Tests\Feature\Api\Veterinaries;

use App\Models\Veterinaries\Veterinary;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserVeterinariesTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.user.veterinaries.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_guest_can_get_own_adoptions()
    {
        $this->signIn();
        $this->create(Veterinary::class);

        $this->signIn();
        $veterinary = $this->create(Veterinary::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $veterinary->id,
                    'user' => ['id' => auth()->user()->id]
                ]
            ]
        ]);
    }
}
