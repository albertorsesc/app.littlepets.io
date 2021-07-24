<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'id' => 1,
                'name' => 'México',
                'code' => 'MX',
                'is_supported' => true,
            ],
            [
                'id' => 2,
                'name' => 'United States',
                'code' => 'US',
                'is_supported' => false,
            ],
        ];

        \DB::table('countries')->insert($countries);
    }
}
