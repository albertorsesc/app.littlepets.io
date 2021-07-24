<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\{Breed, Specie};
use Database\Seeders\SpecieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     */
    public function specie_has_many_breeds()
    {
        $this->loadSeeders([SpecieSeeder::class]);
        $specie = Specie::first();
        $this->create(Breed::class, [
            'specie_id' => $specie->id
        ]);

        $this->assertInstanceOf(Breed::class, $specie->breeds->first());
    }
}
