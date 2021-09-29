<?php

namespace Database\Factories\Events;

use App\Models\Events\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'starts_at' => now()->toDateTimeString(),
            'ends_at' => now()->addDays(rand(1, 365))->toDateTimeString(),
        ];
    }
}
