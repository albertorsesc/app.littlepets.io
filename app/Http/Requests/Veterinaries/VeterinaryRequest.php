<?php

namespace App\Http\Requests\Veterinaries;

use Illuminate\Foundation\Http\FormRequest;

class VeterinaryRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'services' => [
                'required',
                'array',
                'in:' . implode(',', config('littlepets.veterinary_services'))
            ],
            'specialty' => ['nullable', 'max:255'],
            'phone' => ['required', 'max:50'],
            'email' => ['nullable', 'max:100', 'email'],
            'is_open_at_night' => ['boolean'],
            'facebook_profile' => ['max:255'],
            'site' => ['max:255'],
        ];
    }
}
