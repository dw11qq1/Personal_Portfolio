<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Skill extends Model
{
    use LogsActivity;

    protected $fillable = ['name', 'percent', 'sort_order'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'percent', 'sort_order']);
    }
}
