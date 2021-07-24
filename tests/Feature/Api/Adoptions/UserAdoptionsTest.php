<?php

namespace Tests\Feature\Api\Adoptions;

use Tests\AdoptionTestCase;
use App\Models\Adoptions\Adoption;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAdoptionsTest extends AdoptionTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.user.adoptions.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_guest_can_get_own_adoptions()
    {
        $this->signIn();
        $this->create(Adoption::class);

        $this->signIn();
        $adoption = $this->create(Adoption::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $adoption->id,
                    'pet' => ['id' => $adoption->pet->id],
                    'title' => $adoption->title,
                    'bio' => $adoption->bio,
                    'story' => $adoption->story
                ]
            ]
        ]);
    }
}
