<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationSetting extends Model
{
    protected $fillable = [
        'title',
        'route_name',
        'icon',
        'is_visible',
        'order',
        'parent_id',
        'permissions'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'permissions' => 'array'
    ];

    public function parent()
    {
        return $this->belongsTo(NavigationSetting::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavigationSetting::class, 'parent_id');
    }

    public static function getVisibleItems()
    {
        return static::where('is_visible', true)
            ->orderBy('order')
            ->get()
            ->groupBy('parent_id');
    }
}