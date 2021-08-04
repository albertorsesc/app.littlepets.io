<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private array $seeders = [
        SpecieSeeder::class,
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call($this->seeders);

        User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Rosas',
            'email' => 'alberto.rsesc@protonmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
        ]);
    }
}
