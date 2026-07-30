<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['date_range', 'title', 'company', 'description', 'sort_order'];
}
