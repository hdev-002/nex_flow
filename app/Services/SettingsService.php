<?php

namespace App\Services;

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    private const CACHE_KEY = 'business_settings';
    private const CACHE_TTL = 3600; // 1 hour

    public function get($key = null, $default = null)
    {
        $settings = $this->getAllSettings();

        if (is_null($key)) {
            return $settings;
        }

        return $settings[$key] ?? $default;
    }

    public function set($key, $value = null)
    {
        if (is_array($key)) {
            $data = $key;
        } else {
            $data = [$key => $value];
        }

        $success = BusinessSetting::updateSettings($data);

        if ($success) {
            $this->clearCache();
        }

        return $success;
    }

    public function getAllSettings()
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            $settings = BusinessSetting::getSettings();
            return $settings->getAttributes();
        });
    }

    public function clearCache()
    {
        return Cache::forget(self::CACHE_KEY);
    }
}