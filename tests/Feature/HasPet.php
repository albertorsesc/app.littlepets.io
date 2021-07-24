<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;

trait HasPet
{
    public function getPetData($relation, $override = []) : array
    {
        return array_merge([
            'breed_id' => $relation->pet->breed->id,
            'name' => $relation->pet->name,
            'gender' => $relation->pet->gender,
            'size' => $relation->pet->size,
            'age' => $relation->pet->age,
            'age_range' => $relation->pet->age_range,
        ], $override);
    }

    public function seedBreeds()
    {
        Artisan::call('db:seed --class=SpecieSeeder');
        Artisan::call('db:seed --class=BreedSeeder');
    }
}
