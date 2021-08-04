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
                    'name' => 'dog',
                    'display_name' => 'Perro',
                ],
                [
                    'name' => 'cat',
                    'display_name' => 'Gato'
                ],
                [
                    'name' => 'rodent',
                    'display_name' => 'Roedor'
                ],
                [
                    'name' => 'turtle',
                    'display_name' => 'Tortuga'
                ],
                [
                    'name' => 'serpent',
                    'display_name' => 'Serpiente'
                ],
                [
                    'name' => 'bird',
                    'display_name' => 'Ave'
                ],
                [
                    'name' => 'arachnid',
                    'display_name' => 'Arácnido'
                ],
            ];

            Specie::insert($species);
        }
    }
