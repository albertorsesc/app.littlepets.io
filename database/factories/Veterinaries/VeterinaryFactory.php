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
            'phone' => $this->faker->phoneNumber,
            'is_open_at_night' => $this->faker->boolean,
        ];
    }
}
