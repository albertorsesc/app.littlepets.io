<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\Pet;
use App\Models\Specie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'specie_id' => Specie::query()->inRandomOrder()->first()->id,
            'user_id' => User::factory(),
            'name' => $this->faker->word,
            'gender' => $this->faker->randomElement(config('littlepets.genders')),
            'size' => $this->faker->randomElement(config('littlepets.sizes')),
            'age' => rand(1, 20),
            'age_range' => $this->faker->randomElement(config('littlepets.age_ranges'))
        ];
    }
}
