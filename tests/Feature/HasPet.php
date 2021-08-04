<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;

trait HasPet
{
    public function getPetData($relation, $override = []) : array
    {
        return array_merge([
            'specie_id' => $relation->pet->specie_id,
            'name' => $relation->pet->name,
            'gender' => $relation->pet->gender,
            'size' => $relation->pet->size,
            'age' => $relation->pet->age,
            'age_range' => $relation->pet->age_range,
        ], $override);
    }

    public function seedSpecies()
    {
        Artisan::call('db:seed --class=SpecieSeeder');
    }
}
