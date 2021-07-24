<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Specie;
use Database\Seeders\SpecieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpeciesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_species()
    {
       $this->loadSeeders([SpecieSeeder::class]);
        $this->signIn();

        $response = $this->getJson(
            route('api.species.index')
        );
        $response->assertOk();
        $response->assertJsonStructure([
           'data' => [
               ['id', 'name', 'display_name'],
           ]
        ]);
    }
}
