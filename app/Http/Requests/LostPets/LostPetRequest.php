<?php

namespace App\Http\Requests\LostPets;

use App\Models\LostPets\LostPet;
use App\Http\Requests\ValidatePet;
use Illuminate\Foundation\Http\FormRequest;

class LostPetRequest extends FormRequest
{
    use ValidatePet;

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
                'title' => ['nullable', 'max:50'],
                'phone' => ['nullable', 'max:50'],
                'post_type' => [
                    'required',
                    'in:' . implode(',', LostPet::POST_TYPES)
                ],
                'lost_at' => ['required_if:post_type,' . LostPet::POST_TYPES[0]],
                'rescued_at' => ['required_if:post_type,' . LostPet::POST_TYPES[1]],
            ] + $this->validatePet();
    }

    public function messages()
    {
        return [
            'lost_at.required_if' => 'Fecha y hora de extravío es requerido.',
            'rescued_at.required_if' => 'Fecha y hora de rescate es requerido.',
        ];
    }
}
