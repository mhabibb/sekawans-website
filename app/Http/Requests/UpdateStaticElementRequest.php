<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaticElementRequest extends FormRequest
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
        $this->merge([
            'satelite_health_facility_id' => SateliteHealthFacility::firstOrCreate(
                ["id"    => $this->satelite_health_facility_id],
                ["name"  => Str::title($this->satelite_health_facility_id)]
            )->id,
            'worker_id' => Worker::firstOrCreate(
                ["id"    => $this->worker_id],
                ["name"  => Str::title($this->worker_id)]
            )->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'contents'  => 'required|string',
        ];
    }
}
