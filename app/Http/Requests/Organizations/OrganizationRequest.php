<?php

namespace App\Http\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'name' => ['required', 'max:100'],
            'phone' => ['required', 'max:50'],
            'facebook_profile' => ['max:255'],
            'about' => ['max:255'],
            'animal_capacity' => ['required', 'gt:0'],
        ];
    }
}
