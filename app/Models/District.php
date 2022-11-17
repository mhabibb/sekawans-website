<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $with = ['regency'];

    public static function scopeStatusDetails(Regency $district)
    {
        dd($district);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function patientStatus()
    {
        return $this->hasmanyThrough(PatientStatus::class, PatientDetail::class, Patient::class);
    }
}
