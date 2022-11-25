<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fasyankes'     => 'required|string|max:50|',
            'satelite'      => 'required|string',
            'dateStart'     => 'required|date',
            'regNum'        => 'required|integer|',
            'name'          => 'required|string',
            'nik'           => 'required|integer',
            'sexs'          => 'required|string',
            'religions'     => 'required|integer',
            'address'       => 'required|string',
            'addressNow'    => 'required|string',
            'age'           => 'required|integer',
            'phone'         => 'required|integer',
            'educations'    => 'required|integer',
            'maritals'      => 'required|string',
            'jobstat'       => 'required|integer',
            'workplace'     => 'required|string',
            'workAddr'      => 'required|string',
            'depend'        => 'required|integer',
            'height'        => 'required|integer|between:10,250',
            'weight'        => 'required|integer|between:3,100',
            'statuses'      => 'required|integer|between:1,5',
        ];
    }
}
