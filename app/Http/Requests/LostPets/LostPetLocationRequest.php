<?php

namespace App\Http\Requests\LostPets;

use App\Models\LostPets\LostPet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LostPetLocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => ['max:255'],
            'neighborhood' => [
                'max:255',
                Rule::requiredIf(
                    $this->lostPet->post_type === LostPet::POST_TYPES[0]
                )
            ],
            'city' => ['required', 'max:255'],
            'state_id' => ['required', 'exists:states,id'],
            'zip_code' => ['max:20'],
        ];
    }
}
