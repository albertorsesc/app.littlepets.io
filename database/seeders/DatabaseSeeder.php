<?php

namespace Database\Seeders;

use App\Models\Adoptions\Adoption;
use App\Models\LostPets\LostPet;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    private array $productionSeeders = [
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
        $this->call($this->productionSeeders);

        if (! app()->environment('production')) {
            $user = User::create([
                'first_name' => 'Alberto',
                'last_name' => 'Rosas',
                'email' => 'alberto.rsesc@protonmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now()->toDateTimeString(),
                'created_at' => now()->toDateTimeString(),
            ]);
            Auth::login($user);
            Team::factory()->create([
                'name' => 'Patitas Callejeras',
                'personal_team' => true,
                'type' => array_rand(config('littlepets.organizations.types')),
                'phone' => '6862894998',
                'email' => 'patitas.callejeras@gmail.com',
                'facebook_profile' => 'https://facebook.com/patitas-callejeras',
                'site' => 'https://patitas-callejeras.com',
                'capacity' => 20,
                'published_at' => null,
                'verified_at' => now()->toDateTimeString()
            ]);
            Auth::logout();
        }


        /*Auth::login($user);
        $user->adoptions()->create(Adoption::factory()->make()->toArray());
        $user->lostPets()->create(LostPet::factory()->make()->toArray());*/
    }
}
