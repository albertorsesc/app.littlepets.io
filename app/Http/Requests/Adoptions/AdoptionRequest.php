<?php

namespace App\Http\Requests\Adoptions;

use App\Http\Requests\ValidatePet;
use Illuminate\Foundation\Http\FormRequest;

class AdoptionRequest extends FormRequest
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
                'title' => ['required', 'max:50'],
                'phone' => ['nullable', 'max:50'],
            ] + $this->validatePet();
    }
}
