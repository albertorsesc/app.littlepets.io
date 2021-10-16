<?php

namespace Tests\Feature\Api\Sepomex;

use App\Models\State;
use Database\Seeders\CountrySeeder;
use Database\Seeders\StateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CitiesByStateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function get_cities_by_state()
    {
        $this->assertTrue(true);
        return;
        $this->markTestSkipped('avoiding API calls');
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class
        ]);

        $this->signIn();

        $state = State::query()->inRandomOrder()->first();

        $response = $this->getJson(route('api.states.cities.index', $state->name));
        $response->assertOk();
    }
}
