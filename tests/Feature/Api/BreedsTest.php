<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\{Breed, Specie};
use Database\Seeders\{BreedSeeder, SpecieSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;

class BreedsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_breeds_by_specie()
    {
        $this->withoutExceptionHandling();
        $this->loadSeeders([
            SpecieSeeder::class,
            BreedSeeder::class
        ]);
        $specie = Specie::query()->inRandomOrder()->first();
        $this->create(Breed::class, [
            'specie_id' => $specie->id
        ]);

        $this->signIn();

        $response = $this->getJson(
            route('api.species.breeds.index', $specie)
        );
        $response->assertOk();
        $breed = $specie->breeds->first();
        $response->assertJson([
            'data' => [
                [
                    'id' => $breed->id,
                    'name' => $breed->name,
                    'specie_id' => $specie->id
                ],
            ]
        ]);
    }
}
