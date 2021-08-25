<?php

namespace App\Http\Requests\Veterinaries;

use Illuminate\Foundation\Http\FormRequest;

class VeterinaryLocationRequest extends FormRequest
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
            'neighborhood' => ['max:255'],
            'city' => ['required', 'max:255'],
            'state_id' => ['required', 'exists:states,id'],
            'zip_code' => ['max:20'],
        ];
    }
}
