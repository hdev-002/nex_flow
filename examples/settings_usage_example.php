<?php

use App\Facades\Settings;

// Example 1: Get a single setting value
$businessName = Settings::get('business_name', 'Default Business Name');
echo "Business Name: {$businessName}\n";

// Example 2: Get multiple settings at once
$allSettings = Settings::get();
echo "All Settings: " . print_r($allSettings, true) . "\n";

// Example 3: Set a single setting
$success = Settings::set('business_name', 'New Business Name');
echo "Update single setting success: " . ($success ? 'true' : 'false') . "\n";

// Example 4: Set multiple settings at once
$success = Settings::set([
    'business_email' => 'new@example.com',
    'business_phone' => '+1234567890',
    'business_address' => '123 Business Street'
]);
echo "Update multiple settings success: " . ($success ? 'true' : 'false') . "\n";

// Example 5: Get a setting with default value if not exists
$customSetting = Settings::get('custom_setting', 'Default Value');
echo "Custom Setting with default: {$customSetting}\n";