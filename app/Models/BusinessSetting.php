<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    protected $fillable = [
        'business_name',
        'business_email',
        'business_phone',
        'business_address',
        'timezone',
        'date_format',
        'currency_symbol',
        'default_language',
        'light_logo',
        'dark_logo'
    ];

    public static function getSettings()
    {
        return static::first() ?? new static();
    }

    public static function updateSettings(array $data)
    {
        $settings = static::first();
        
        if ($settings) {
            return $settings->update($data);
        }
        
        return static::create($data);
    }
}