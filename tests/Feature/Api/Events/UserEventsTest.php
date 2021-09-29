<?php

namespace Tests\Feature\Api\Events;

use App\Models\Events\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserEventsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.user.events.';

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_guest_can_get_own_events()
    {
        $this->signIn();
        $this->create(Event::class);

        $this->signIn();
        $event = $this->create(Event::class);

        $this->getJson(
            route($this->routePrefix . 'index')
        )->assertOk();
    }
}
