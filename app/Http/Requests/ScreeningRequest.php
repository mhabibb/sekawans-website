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
            'agreement' => 'required',
            'full_name' => 'required|string',
            'contact' => 'required|string',
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric',
            'district' => 'required|string',
            'screening_date' => 'required|date',
            'home_contact' => 'required|in:1,0',
            'cough' => 'required|in:1,0',
            'breath' => 'required|in:1,0',
            'sweat' => 'required|in:1,0',
            'fever' => 'required|in:1,0',
            'weight_loss' => 'required|in:1,0',
            'pregnant' => 'required|in:1,0',
            'elderly' => 'required|in:1,0',
            'diabetes' => 'required|in:1,0',
            'smoking' => 'required|in:1,0',
            'close_contact' => 'required|in:1,0',
            'ever_treatment' => 'required|in:1,0',
            'contact1_name' => 'required|string',
            'contact1_number' => 'required|string',
            'contact2_name' => 'required|string',
            'contact2_number' => 'required|string',
            'contact3_name' => 'required|string',
            'contact3_number' => 'required|string'
        ];
    }
}
