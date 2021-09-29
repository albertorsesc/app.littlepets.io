<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Events\Event;
use App\Models\Concerns\CanBeReported;
use App\Models\Concerns\SerializeTimestamps;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function event_belongs_to_a_user()
    {
        $this->fakeEvent();

        $event = $this->create(Event::class);

        $this->assertInstanceOf(User::class, $event->user);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function event_uses_serialize_timestamps_trait()
    {
        $this->assertClassUsesTrait(
            SerializeTimestamps::class,
            Event::class
        );
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function event_uses_can_be_reported_trait()
    {
        $this->assertClassUsesTrait(
            CanBeReported::class,
            Event::class
        );
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function event_can_retrieve_its_own_profile_route()
    {
        $this->fakeEvent();

        $event = $this->create(Event::class);
        $this->assertEquals(
            $event->profile(),
            config('app.url') . '/eventos/' . $event->id
        );
    }
}
