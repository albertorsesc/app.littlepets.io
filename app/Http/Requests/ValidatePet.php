<?php

namespace App\Http\Requests;

trait ValidatePet
{
    public function validatePet () : array
    {
        return [
            'specie_id' => ['required', 'exists:species,id'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', 'in:' . implode(',', config('littlepets.genders'))],
            'size' => ['required', 'max:50', 'in:' . implode(',', config('littlepets.sizes'))],
            'age' => ['required_with:age_range', 'integer', 'max:30', 'gt:0'],
            'age_range' => ['required_with:age', 'in:' . implode(',', config('littlepets.age_ranges'))],
        ];
    }
}
