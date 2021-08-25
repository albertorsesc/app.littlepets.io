<?php

namespace Database\Factories\Veterinaries;

use App\Models\User;
use App\Models\Veterinaries\Veterinary;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeterinaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veterinary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company,
            'services' => $this->faker->randomElements(config('littlepets.veterinary_services')),
            'specialty' => $this->faker->sentence,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
            'facebook_profile' => $this->faker->url,
            'site' => $this->faker->url,
            'is_open_at_night' => $this->faker->boolean,
            'about' => $this->faker->paragraph,
            'published_at' => null,
            'status' => false,
        ];
    }

    public function slugged() : VeterinaryFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'slug' => $this->faker->slug,
            ];
        });
    }

    public function published() : VeterinaryFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => now()->toDateTimeString(),
            ];
        });
    }
}
