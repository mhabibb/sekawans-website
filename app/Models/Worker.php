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

    public $timestamps = true;

    public function patientDetails()
    {
        return $this->hasMany(PatientDetail::class);
    }

    // validasi untuk model bro
    public static function rules($id = null)
    {
        return [
            'name' => 'required|string|max:64|unique:workers,name,' . $id,
        ];
    }

    // Atur aktivitas logging
    public function getActivitylogOptions(): LogOptions
    {
        $user = auth()->user()->name ?? 'System';
        $name = $this->name;
        return LogOptions::defaults()
            ->logAll()
            ->useLogName('patient supporter')
            ->setDescriptionForEvent(fn (string $eventName) => "{$user} {$eventName} PS {$name}");
    }
}
