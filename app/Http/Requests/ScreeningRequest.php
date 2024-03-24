<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScreeningRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'agreement' => 'required|boolean',
            'full_name' => 'required|string',
            'contact' => 'nullable|string',
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric',
            'district' => 'required|string',
            'screening_date' => 'required|date',
            'home_contact' => 'required|boolean',
            'cough' => 'required|boolean',
            'breath' => 'required|boolean',
            'sweat' => 'required|boolean',
            'fever' => 'required|boolean',
            'weight_loss' => 'required|boolean',
            'pregnant' => 'required|boolean',
            'elderly' => 'required|boolean',
            'diabetes' => 'required|boolean',
            'smoking' => 'required|boolean',
            'close_contact' => 'required|boolean',
            'ever_treatment' => 'required|boolean',
            'contact1_name' => 'nullable|string',
            'contact1_number' => 'nullable|string',
            'contact2_name' => 'nullable|string',
            'contact2_number' => 'nullable|string',
            'contact3_name' => 'nullable|string',
            'contact3_number' => 'nullable|string'
        ];
    }
}
