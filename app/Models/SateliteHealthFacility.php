<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SateliteHealthFacility extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $timestamp = false;

    public function patientDetails()
    {
        $this->hasMany(PatientDetail::class);
    }
}
