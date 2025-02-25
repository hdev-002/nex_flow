<?php

return [
    [
        'name' => 'Locations',
        'route_name' => 'locations.list',
        'icon' => '<i class="ki-outline ki-geolocation fs-2"></i>',
        'children' => [],
    ],
    [
        'name' => 'Backup & Restore',
        'route_name' => 'backup',
        'icon' => '<i class="ki-outline ki-external-drive fs-2"></i>',
        'children' => [],
    ],
    [
        'name' => 'Settings',
        'route_name' => 'business.settings',
        'icon' => '<i class="ki-outline ki-external-drive fs-2"></i>',
        'children' => [
            [
                'name' => 'Business Settings',
                'route_name' => 'business.settings',
            ],
            [
                'name' => 'Menu Settings',
                'route_name' => 'navigation.customize',
            ],
            [
                'name' => 'Dashbaord Csustomize',
                'route_name' => 'dashboard.customize',
            ],
        ],
    ],
    
];
