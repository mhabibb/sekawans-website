<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

class UpdateSatelliteHealthFacilityRequest extends UpdateSatelliteWorkerRequest
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
            'name'      => "required|string|unique:satelite_health_facilities|max:64",
        ];
    }
}
