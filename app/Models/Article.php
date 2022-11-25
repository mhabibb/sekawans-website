<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Article extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['category', 'user'];

    protected $casts = [
        'preferences' => 'collection'
    ];

    protected static $logName = 'article';

    public function getActivitylogOptions(): LogOptions
    {
        $user = auth()->user()->name;
        return LogOptions::defaults()
            ->logFillable()
            ->logUnguarded()
            ->logOnlyDirty()
            ->useLogName('article')
            ->setDescriptionForEvent(fn(string $eventName) => "{$user} {$eventName} article");
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }

    public function scopeUser($query, $user = null)
    {
        return $query->where('user_id', $user ?? auth()->id());
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
