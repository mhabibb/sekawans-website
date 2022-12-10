<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PatientDetail extends Model
{
    use HasFactory, LogsActivity;

    // public $timestamps = false;

    protected $guarded = ['id'];

    protected $with = ['patientStatus', 'patient', 'satelliteHealthFacility', 'worker'];

    public function getActivitylogOptions(): LogOptions
    {
        $user = auth()->user()->name ?? 'System';
        $name = $this->patient->name;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('patient detail')
            ->setDescriptionForEvent(fn (string $eventName) => "{$user} {$eventName} patient detail {$name}");
    }

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

    public function satelliteHealthFacility()
    {
        return $this->belongsTo(SatelliteHealthFacility::class);
    }
}
