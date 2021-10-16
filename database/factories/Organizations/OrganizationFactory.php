<?php

namespace Database\Factories\Organizations;

use App\Models\Organizations\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'facebook_profile' => $this->faker->url,
            'about' => $this->faker->paragraph,
            'animal_capacity' => $this->faker->biasedNumberBetween(1, 100),
        ];
    }
}
