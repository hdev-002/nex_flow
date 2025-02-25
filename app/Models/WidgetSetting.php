<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WidgetSetting extends Model
{
    protected $fillable = [
        'user_id',
        'widget_type',
        'title',
        'value_type',
        'visible',
        'position',
        'settings'
    ];

    protected $casts = [
        'visible' => 'boolean',
        'position' => 'integer',
        'settings' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getDefaultWidgets(): array
    {
        return [
            [
                'widget_type' => 'stats',
                'title' => 'Active Users',
                'value_type' => 'users_count',
                'visible' => true,
                'position' => 0
            ],
            [
                'widget_type' => 'stats',
                'title' => 'Business Locations',
                'value_type' => 'locations_count',
                'visible' => true,
                'position' => 1
            ],
            [
                'widget_type' => 'stats',
                'title' => 'Active Applications',
                'value_type' => 'applications_count',
                'visible' => true,
                'position' => 2
            ],
            [
                'widget_type' => 'stats',
                'title' => 'Active Modules',
                'value_type' => 'modules_count',
                'visible' => true,
                'position' => 3
            ]
        ];
    }
}