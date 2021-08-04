<?php

namespace Tests;

use Tests\Feature\HasPet;

class AdoptionTestCase extends TestCase
{
    use HasPet;

    protected function setUp () : void
    {
        parent::setUp();
        $this->seedSpecies();
    }

    public function getAdoptionData($adoption, $override = []) : array
    {
        return array_merge(
            array_merge([
                'title' => $adoption->title,
                'phone' => $adoption->phone,
                'bio' => $adoption->bio,
                'story' => $adoption->story,
            ], $override),
            $this->getPetData($adoption, $override)
        );
    }
}
