<?php

namespace Tests\Feature\Api\Veterinaries\Actions;

use App\Models\Veterinaries\Veterinary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublishVeterinaryTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.veterinaries.';

    /**
     *   @test
     *   @throws \Throwable
     *  @endpoint ['PUT', '/api/veterinaries/{adoption}/toggle']
     */
    public function authenticated_user_can_publish_a_veterinary()
    {
        $this->signIn();

        $veterinary = $this->create(Veterinary::class, ['published_at' => null]);
        $this->assertNull($veterinary->published_at);

        $this->putJson(route($this->routePrefix . 'toggle', $veterinary));
        $this->assertEquals(
            $veterinary->fresh()->published_at,
            now()->toDateTimeString()
        );

        $this->putJson(route($this->routePrefix . 'toggle',  $veterinary));
        $this->assertNull($veterinary->fresh()->published_at);
    }
}
