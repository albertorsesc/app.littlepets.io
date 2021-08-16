<?php

namespace Database\Factories\Adoptions;

use App\Models\Pet;
use App\Models\Adoptions\Adoption;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdoptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adoption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $uuid = $this->faker->uuid,
            'pet_id' => Pet::factory(),
            'title' => $this->faker->sentence(3),
            'phone' => $this->faker->phoneNumber,
            'bio' => $this->faker->paragraph,
            'story' => $this->faker->paragraph,
            'published_at' => null,
            'adopted_at' => null,
        ];
    }

    public function published() : AdoptionFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => $this->faker->dateTime,
            ];
        });
    }
}
