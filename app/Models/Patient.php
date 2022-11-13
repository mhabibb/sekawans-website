<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['district', 'worker'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
