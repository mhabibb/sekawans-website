<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;

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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(
            ["name"  => Str::upper($this->name)]
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => "required|string|unique:satellite_health_facilities|max:64",
        ];
    }
}
