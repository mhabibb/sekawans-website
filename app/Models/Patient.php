<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['district', 'education', 'religion', 'emergency_contact'];

    // public function patientStatus()
    // {
    //     return $this->hasOneThrough(PatientStatus::class, PatientDetail::class);
    // }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function emergency_contact()
    {
        return $this->belongsTo(EmergencyContact::class);
    }

    public function patientDetail()
    {
        return $this->hasOne(PatientDetail::class);
    }
}
