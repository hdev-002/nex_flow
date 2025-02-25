<?php

namespace App\Traits;

trait DashboardAble
{
    public static function getWidgetDataTypes(): array
    {
        $modelName = class_basename(static::class);
        return [
            'total' => "Total {$modelName}",
            'status_counts' => "{$modelName} Status Distribution",
            'recent' => "Recent {$modelName}",
            'by_user' => "{$modelName} by User",
            'active' => "Active {$modelName}"
        ];
    }

    public static function getWidgetData(string $type): mixed
    {
        return match ($type) {
            'total' => static::count(),
            'status_counts' => static::selectRaw('status, count(*) as count')
                ->groupBy('status')
                ->get(),
            'recent' => static::latest()->limit(5)->get(),
            'by_user' => static::selectRaw('user_id, count(*) as count')
                ->groupBy('user_id')
                ->get(),
            'active' => static::where('status', 'active')->count(),
            default => null
        };
    }
}