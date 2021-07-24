<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\State;
use App\Models\Country;
use Database\Seeders\{CountrySeeder, StateSeeder};
use Illuminate\Foundation\Testing\RefreshDatabase;

class StateTest extends TestCase
{
    use RefreshDatabase;

    /**
     *   @test
     *   @throws \Throwable
     */
    public function state_belongs_to_a_country()
    {
        $this->withoutExceptionHandling();
        $this->loadSeeders([
            CountrySeeder::class,
            StateSeeder::class
        ]);

        $this->assertInstanceOf(Country::class, State::first()->country);
    }
}
