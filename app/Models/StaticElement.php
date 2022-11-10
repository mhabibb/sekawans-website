<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticElement extends Model
{
    use HasFactory;

    protected $fillable = ['elements', 'contents'];
}
