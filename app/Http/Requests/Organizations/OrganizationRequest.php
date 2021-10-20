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
            'name' => ['required', 'max:255', 'string', 'unique:teams,name'],
            'type' => ['required', 'in:' . implode(',', config('littlepets.organizations.types'))],
            'capacity' => ['required', 'integer', 'max:200'],
            'phone' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:150'],
            'facebook_profile' => ['max:255', 'url'],
            'site' => ['max:255', 'url'],
        ];
    }
}
