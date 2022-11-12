<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    // public $with = ['articles'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
