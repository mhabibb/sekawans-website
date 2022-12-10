<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Worker extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function getActivitylogOptions(): LogOptions
    {
        $user = auth()->user()->name ?? 'System';
        $name = $this->name;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('patient supporter')
            ->setDescriptionForEvent(fn (string $eventName) => "{$user} {$eventName} PS {$name}");
    }

    // public function scopeActive($query)
    // {
    //     return  $query->where('is_active', 1);
    // }

    public function patientDetails()
    {
        return $this->hasMany(PatientDetail::class);
    }
}
