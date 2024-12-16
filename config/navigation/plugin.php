<?php

return [
    [
        'name' => 'Plugins',
        'route_name' => 'users.dashboard',
        'icon' => '<i class="ki-outline ki-data fs-2"></i>',
        'children' => [
            [
                'name' => 'Marketplace',
                'route_name' => 'plugins.marketplace',
            ],
            [
                'name' => 'Installed',
                'route_name' => 'plugins.installed',
            ],
        ],
    ],
];
