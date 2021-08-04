<?php

namespace App\Http\Requests\LostPets;

use App\Models\LostPets\LostPet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class ReportLostPetRequest extends FormRequest
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
            'reporting_cause' => ['required', 'max:100'],
            'comments' => [
                'max:255',
                'required_if:reporting_cause,' . (new LostPet())->getReportingCauses()['other']
            ],
        ];
    }
}
