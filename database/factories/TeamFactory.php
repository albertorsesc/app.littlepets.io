<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $name = $this->faker->unique()->company(),
            'slug' => Str::slug($name),
            'type' => $this->faker->randomElement(config('littlepets.organizations.types')),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'facebook_profile' => $this->faker->url,
            'site' => $this->faker->url,
            'capacity' => $this->faker->randomNumber(2),
            'about' => $this->faker->paragraph,
            'personal_team' => $this->faker->boolean,
            'logo' => null,
            'published_at' => null,
            'verified_at' => null,
        ];
    }

    public function published() : TeamFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => $this->faker->dateTime,
            ];
        });
    }
}
