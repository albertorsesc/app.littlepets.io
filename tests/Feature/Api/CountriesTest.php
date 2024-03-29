<?php

namespace Tests\Feature\Api;

use App\Models\Country;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function get_all_countries()
    {
        $this->loadSeeders([CountrySeeder::class]);

        $this->signIn();

        $country = Country::isSupported()->first();

        $response = $this->getJson(route('api.countries.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'name' => $country->name,
                    'code' => $country->code,
                    'is_supported' => $country->is_supported
                ]
            ]
        ]);
    }
}
