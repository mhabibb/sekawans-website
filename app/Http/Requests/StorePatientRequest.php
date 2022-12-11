<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SatelliteHealthFacility;
use App\Models\Worker;
use Illuminate\Support\Str;

class StorePatientRequest extends FormRequest
{
    // protected $stopOnFirstFailure = true;
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
            'satellite_health_facility_id' => $this->satellite_health_facility_id ? SatelliteHealthFacility::firstOrCreate(
                ["id"    => $this->satellite_health_facility_id],
                ["name"  => str(str($this->satellite_health_facility_id)->whenContains(' ', fn ($name)
                => (str($name)->explode(' ')->map(fn ($name, $key) => $key !== 0 ? ucfirst($name) : $name))->implode(' ')))->value()]
            )->id : false,
            'worker_id'  => $this->worker_id ? Worker::firstOrCreate(
                ["id"    => $this->worker_id],
                ["name"  => str(str(Str::title($this->worker_id))->whenContains('.', fn ($name)
                => (str($name)->explode('.')->map(fn ($name) => ucfirst($name)))->implode('.')))->value()]
            )->id : false,
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
            'tb_health_facility'            => 'required|string|max:50',
            'satellite_health_facility_id'   => 'required|integer',
            'start_treatment'               => 'required|date|before_or_equal:today',
            'no_regis'                      => 'required|integer|',
            'worker_id'                     => 'required|integer',
            'name'                          => 'required|string|max:50',
            'id_number'                     => 'required|integer|digits:16',
            'sex'                           => 'required|string|in:laki-laki,perempuan',
            'religion_id'                   => 'required|integer|between:1,6',
            'id_card_address'               => 'required|string',
            'residence_address'             => 'required|string',
            'district_id'                   => 'required|integer|digits:7',
            'age'                           => 'required|integer|between:1,100',
            'phone'                         => 'required|numeric|digits_between:10,16',
            'education_id'                  => 'required|integer|between:1,5',
            'marital_status'                => 'required|string|in:menikah,belum menikah,janda/duda',
            'has_job'                       => 'required|boolean',
            'workplace'                     => 'required_unless:has_job,0|exclude_unless:has_job,1|string|max:50',
            'work_address'                  => 'required_unless:has_job,0|exclude_unless:has_job,1|string',
            'dependent'                     => 'required|integer|between:0,100',
            'height'                        => 'required|integer|between:10,250',
            'weight'                        => 'required|integer|between:3,100',
            'mother_name'                   => 'required|string|max:50',
            'father_name'                   => 'required|string|max:50',
            'guardian_address'              => 'required|string',
            'guardian_phone'                => 'required|numeric|digits_between:10,16',
            'emergency'                     => 'required|array|size:5',
            "emergency.name"                => 'required|string|max:50',
            "emergency.relation"            => 'required|string|max:50',
            "emergency.address"             => 'required|string',
            "emergency.phone"               => 'required|numeric|digits_between:10,16',
            "emergency.is_know"             => 'required|boolean',
        ];
    }
}
