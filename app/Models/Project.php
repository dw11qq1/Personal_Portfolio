<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'tags', 'sort_order'];

    protected $casts = [
        'tags' => 'array',
    ];

    /**
     * 防御性：万一数据库存的不是纯 JSON，返回空数组防止 foreach 报错
     */
    public function getTagsAttribute($value): array
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);

            return is_array($decoded) ? $decoded : [];
        }

        return is_array($value) ? $value : [];
    }
}
