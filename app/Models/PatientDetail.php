<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $guarded = ['id'];

    protected $with = ['patientStatus', 'patient', 'sateliteHealthFacility', 'worker'];


    public function scopeInTreatment($query)
    {
        $query->whereIn('patient_status_id', [2, 3]);
    }

    public function patientStatus()
    {
        return $this->belongsTo(PatientStatus::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function sateliteHealthFacility()
    {
        return $this->belongsTo(SateliteHealthFacility::class);
    }
}
