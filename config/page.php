<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Module Name
    |--------------------------------------------------------------------------
    |
    | This just example of config, useless.
    |
    */
    'name' => 'Page',
    'model' => \Modules\Page\Models\Page::class,
    'tenant' => [
        'model' => null,
    ],
    'app_ids' => [
        'website',
        'user',
    ],
//    'resource' => \Modules\Page\Http\Resources\PageResource::class,

    /*
    |--------------------------------------------------------------------------
    | Filament Configurations
    |--------------------------------------------------------------------------
    |
    | Mainly this is for extended resources.
    |
    */
//    'filament' => [
//        'resource_extended' => false,
//        'page_extended' => false,
//        'widget_extended' => false,
//    ],

    'admin' => [
        'index' => ['enabled' => false],
        'show' => ['enabled' => false],
        'store' => ['enabled' => false],
        'update' => ['enabled' => false],
        'destroy' => ['enabled' => false],

    ]
];
