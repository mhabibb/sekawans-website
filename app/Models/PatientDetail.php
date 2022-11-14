<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['worker', 'patientStatus', 'patient'];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function patientStatus()
    {
        return $this->belongsTo(PatientStatus::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
