<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
    use LogsActivity;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'cover_image', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug', 'excerpt', 'content', 'cover_image', 'published_at']);
    }

    /**
     * 前台作用域：只取已发布的文章，按发布时间倒序
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now())->orderByDesc('published_at');
    }
}
