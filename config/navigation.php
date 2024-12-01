<?php

return [
    [
        'name' => 'Dashboard',
        'route_name' => 'dashboard',
        'icon' => 'dashboard-icon',
        'children' => [],
    ],
    [
        'name' => 'Users',
        'route_name' => 'students.index',
        'icon' => 'users-icon',
        'children' => [
            [
                'name' => 'List',
                'route_name' => 'students.index',
            ],
            [
                'name' => 'Create',
                'route_name' => 'students.index',
            ],
        ],
    ],
    [
        'name' => 'Settings',
        'route_name' => 'settings.index',
        'icon' => 'settings-icon',
        'children' => [
            [
                'name' => 'General',
                'route_name' => 'students.index',
            ],
            [
                'name' => 'Security',
                'route_name' => 'students.index',
            ],
        ],
    ],
];
