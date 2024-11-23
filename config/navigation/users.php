<?php

return [
    [
        'name' => 'Users',
        'route_name' => 'users.dashboard',
        'icon' => '<i class="ki-outline ki-shield-tick fs-2"></i>',
        'children' => [
            [
                'name' => 'List',
                'route_name' => 'users.list',
            ],
            [
                'name' => 'Create',
                'route_name' => 'users.create',
            ],
        ],
    ],
];
