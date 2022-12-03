<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;


    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function patients()
    {
        return $this->hasManyThrough(Patient::class, District::class);
    }

    public function scopeCount($query, $param)
    {
        if ($param === 'status') {
            $this->patientCount($query->withWhereHas('districts'));
        }

        if ($param === 'detailStatus') {
            $query->withWhereHas('districts', fn ($query) => $this->patientCount($query)->whereHas('patients'));
        }
    }

    private function patientCount($query)
    {
        return $query->withCount([
            'patients as total',
            'patients as sembuh' => fn ($query) => $query->withWhereHas('patientDetail', fn ($query) => $query->where('patient_status_id', 1)),
            'patients as berobat' => fn ($query) => $query->withWhereHas('patientDetail', fn ($query) => $query->where('patient_status_id', 2)),
            'patients as mangkir' => fn ($query) => $query->withWhereHas('patientDetail', fn ($query) => $query->where('patient_status_id', 3)),
            'patients as ltfu' => fn ($query) => $query->withWhereHas('patientDetail', fn ($query) => $query->where('patient_status_id', 4)),
            'patients as meninggal' => fn ($query) => $query->withWhereHas('patientDetail', fn ($query) => $query->where('patient_status_id', 5))
        ]);
    }
}
