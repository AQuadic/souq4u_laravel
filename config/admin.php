<?php

return [
    'name' => 'Admin',
    'model' => \Modules\Admin\Models\Admin::class,

    'admin' => [
        'index' => [
            'enabled' => false
        ],
        'show' => [
            'enabled' => false
        ],
        'store' => [
            'enabled' => false
        ],
        'update' => [
            'enabled' => false
        ],
        'destroy' => [
            'enabled' => false
        ]
    ],

    'filament' => [
        'resource_extended' => false,
        'page_extended' => false,
        'widget_extended' => false,
    ],

    'tenant' => [
        'model' => null,
    ],

    'login' => [
        'enabled' => false,
    ],
];
