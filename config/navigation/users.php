<?php

return [
    [
        'name' => 'Users',
        'route_name' => 'users.index',
        'icon' => 'users-icon',
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
