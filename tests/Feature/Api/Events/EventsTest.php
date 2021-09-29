<?php

namespace Tests\Feature\Api\Events;

use Tests\TestCase;
use App\Models\Events\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.events.';

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_events()
    {
        $this->signIn();

        $event = $this->create(Event::class);

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $event->id,
                    'user' => ['id' => $event->user->id],
                    'title' => $event->title,
                    'description' => $event->description,
                    'startsAt' => $event->starts_at,
                    'endsAt' => $event->ends_at,
                    'meta' => [
                        'profile' => $event->profile(),
                    ],
                ]
            ]
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_store_an_event()
    {
        $this->signIn();

        $event = $this->make(Event::class, ['user_id' => auth()->id()]);

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['title' => $event->title]
        ]);

        $this->assertDatabaseHas(
            'events',
            $event->toArray()
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_update_an_event()
    {
        $this->signIn();

        $existingEvent = $this->create(Event::class);
        $newEvent = $this->make(Event::class, ['user_id' => auth()->id()]);

        $response = $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $newEvent->toArray()
        );
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $existingEvent->id,
                'title' => $newEvent->title
            ]
        ]);

        $this->assertDatabaseHas(
            'events',
            $newEvent->toArray()
        );
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_delete_an_event()
    {
        $this->signIn();

        $event = $this->create(Event::class);

        $this->deleteJson(
            route($this->routePrefix . 'destroy', $event)
        )->assertStatus(204);

        $this->assertDatabaseMissing('events', $event->toArray());
    }
}
