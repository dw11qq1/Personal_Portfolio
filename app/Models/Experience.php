<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Experience extends Model
{
    use LogsActivity;

    protected $fillable = ['date_range', 'title', 'company', 'description', 'sort_order'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['date_range', 'title', 'company', 'description', 'sort_order']);
    }
}
