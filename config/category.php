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
    'name' => 'Category',
    'model' => \Modules\Category\Models\Category::class,
    'resource' => \Modules\Category\Http\Resources\CategoryResource::class,
    'tenant' => [
        'model' => null,
    ],
    'types' => [
//        'product'
    ],
    /*
    |--------------------------------------------------------------------------
    | Is There Parent \ Child
    |--------------------------------------------------------------------------
    |
    |
    */
    'parent' => true,

    /*
    |--------------------------------------------------------------------------
    | Image Usage
    |--------------------------------------------------------------------------
    |
    | If Images are enabled at all, and if child images enabled and if parent images.
    |
    */
    'image' => [
        'enabled' => true,
        'parent' => true,
        'child' => true,
    ],
];
