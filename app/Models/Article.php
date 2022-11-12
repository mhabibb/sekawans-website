<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['user'];

    public function scopeCategory($query, $category)
    {
        // dd($query->where('category_id', $category)->get());
        return $query->where('category_id', $category);
    }

    public function scopeUser($query, $user)
    {
        return $query->where('user_id', $user);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
