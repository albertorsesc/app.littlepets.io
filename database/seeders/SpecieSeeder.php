<?php

namespace Database\Seeders;

use App\Models\Specie;
use Illuminate\Database\Seeder;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $species = [
            [
                'id' => 1,
                'name' => 'dog',
                'display_name' => 'Perro',
            ],
            [
                'id' => 2,
                'name' => 'cat',
                'display_name' => 'Gato'
            ],
            [
                'id' => 3,
                'name' => 'rodent',
                'display_name' => 'Roedor'
            ],
            [
                'id' => 4,
                'name' => 'turtle',
                'display_name' => 'Tortuga'
            ],
            [
                'id' => 5,
                'name' => 'serpent',
                'display_name' => 'Serpiente'
            ],
            [
                'id' => 6,
                'name' => 'bird',
                'display_name' => 'Ave'
            ],
            [
                'id' => 7,
                'name' => 'arachnid',
                'display_name' => 'Arácnido'
            ],
        ];

        Specie::insert($species);
    }
}
