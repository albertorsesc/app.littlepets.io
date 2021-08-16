<?php

namespace Database\Factories\LostPets;

use App\Models\Pet;
use App\Models\LostPets\LostPet;
use Illuminate\Database\Eloquent\Factories\Factory;

class LostPetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LostPet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $uuid = $this->faker->uuid,
            'post_type' => $this->faker->randomElement(\App\Models\LostPets\LostPet::POST_TYPES),
            'pet_id' => Pet::factory(),
            'title' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->paragraph,
            'published_at' => null,
            'lost_at' => $this->faker->dateTime,
            'found_at' => null,
            'rescued_at' => null,
        ];
    }

    public function fromOwner() : LostPetFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'post_type' => 'owner',
                'lost_at' => $this->faker->dateTime,
            ];
        });
    }

    public function published() : LostPetFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => $this->faker->dateTime,
            ];
        });
    }

    public function fromRescuer() : LostPetFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'post_type' => 'rescuer',
                'rescued_at' => $this->faker->dateTime,
            ];
        });
    }
}
