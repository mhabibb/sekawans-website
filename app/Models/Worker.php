<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function scopeActive($query)
    {
        return  $query->where('is_active', 1);
    }

    public function patientDetails()
    {
        return $this->hasMany(PatientDetail::class);
    }
}
