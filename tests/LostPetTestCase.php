<?php

namespace Tests;

use Tests\Feature\HasPet;
use Database\Seeders\{BreedSeeder, SpecieSeeder};

class LostPetTestCase extends TestCase
{
    use HasPet;

    protected function setUp () : void
    {
        parent::setUp();
        $this->seedSpecies();
    }

    public function getLostPetData($lostPet, $override = []) : array
    {
        return array_merge(
            array_merge([
                'post_type' => $lostPet->post_type,
                'title' => $lostPet->title,
                'phone' => $lostPet->phone,
                'description' => $lostPet->description,
                'lost_at' => $lostPet->lost_at,
                'found_at' => $lostPet->found_at,
                'rescued_at' => $lostPet->rescued_at,
            ], $override),
            $this->getPetData($lostPet, $override)
        );
    }
}
