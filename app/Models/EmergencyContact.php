<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['district'];

    public $timestamps = false;

    public function scopeLast($query)
    {
        $query->orderBy('id', 'desc')->take(1);
    }

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
