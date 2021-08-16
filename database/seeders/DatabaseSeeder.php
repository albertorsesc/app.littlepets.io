<?php

namespace Database\Seeders;

use App\Models\Adoptions\Adoption;
use App\Models\LostPets\LostPet;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    private array $seeders = [
        CountrySeeder::class,
        StateSeeder::class,
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

        $user = User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Rosas',
            'email' => 'alberto.rsesc@protonmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()->toDateTimeString(),
            'created_at' => now()->toDateTimeString(),
        ]);
        /*Auth::login($user);
        $user->adoptions()->create(Adoption::factory()->make()->toArray());
        $user->lostPets()->create(LostPet::factory()->make()->toArray());*/
    }
}
