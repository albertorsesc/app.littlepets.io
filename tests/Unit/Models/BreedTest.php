<?php

namespace Tests\Unit\Models;

use App\Models\Breed;
use App\Models\Specie;
use Database\Seeders\SpecieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BreedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function breed_belongs_to_specie()
    {
        $this->loadSeeders([SpecieSeeder::class]);
        $breed = $this->create(Breed::class);
        
        $this->assertInstanceOf(Specie::class, $breed->specie);
    }
}
