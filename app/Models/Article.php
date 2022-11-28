<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory, LogsActivity, softDeletes, Prunable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['category', 'user'];

    protected $casts = [
        'preferences' => 'collection'
    ];

    protected static $logName = 'article';


    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        activity()->disableLogging();
        return static::where('deleted_at', '<=', now()->subMonths(3));
    }

    /**
     * Prepare the model for pruning.
     *
     * @return void
     */
    protected function pruning()
    {
        Storage::delete($this->img);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $user = auth()->user()->name ?? 'System';
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->useLogName('article')
            ->setDescriptionForEvent(fn (string $eventName) => "{$user} {$eventName} article");
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
