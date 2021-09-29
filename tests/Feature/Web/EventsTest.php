<?php

namespace Tests\Feature\Web;

use App\Models\Events\Event;
use Tests\TestCase;
use App\Models\LostPets\LostPet;
use Database\Seeders\SpecieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_events_view()
    {
        $this->signIn();

        $response = $this->get(route('web.events.index'));
        $response->assertViewIs('events.index');
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_an_event_profile()
    {
        $this->signIn();

        $event = $this->create(Event::class);

        $response = $this->get(route('web.events.show', $event));
        $response->assertViewIs('events.show');
        $response->assertViewHas('event');
    }
}
