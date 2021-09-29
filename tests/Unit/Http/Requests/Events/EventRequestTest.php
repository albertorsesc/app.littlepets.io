<?php

namespace Tests\Unit\Http\Requests\Events;

use App\Models\Events\Event;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.events.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function title_is_required()
    {
        $validatedField = 'title';
        $brokenRule = null;
        $event = $this->make(Event::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function title_must_not_exceed_100_characters()
    {
        $validatedField = 'title';
        $brokenRule = Str::random(101);
        $event = $this->make(Event::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [$validatedField => $brokenRule])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function starts_at_is_required()
    {
        $validatedField = 'starts_at';
        $brokenRule = null;
        $event = $this->make(Event::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function starts_at_must_be_a_date_after_today()
    {
        $validatedField = 'starts_at';
        $brokenRule = now()->subDay()->toDateTimeString();
        $event = $this->make(Event::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function starts_at_must_have_a_valid_datetime_format()
    {
        $validatedField = 'starts_at';
        $brokenRule = '2021';
        $event = $this->make(Event::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function ends_at_is_required()
    {
        $validatedField = 'ends_at';
        $brokenRule = null;
        $event = $this->make(Event::class, [
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function ends_at_must_be_a_date_after_starts_at()
    {
        $validatedField = 'ends_at';
        $brokenRule = now()->toDateTimeString();
        $event = $this->make(Event::class, [
            'starts_at' => now()->addDays(2)->toDateTimeString(),
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $event->toArray()
        )->assertJsonValidationErrors($validatedField);

        $existingEvent = $this->create(Event::class);
        $this->putJson(
            route($this->routePrefix . 'update', $existingEvent),
            $this->make(Event::class, [
                'starts_at' => now()->addDays(2)->toDateTimeString(),
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
