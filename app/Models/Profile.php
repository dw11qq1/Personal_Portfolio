<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Profile extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name', 'title', 'subtitle',
        'years_experience', 'projects_count', 'clients_count', 'awards_count',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(array_keys($this->fillable));
    }
}
