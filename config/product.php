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
    'name' => 'Product',
    'model' => \Modules\Product\Models\Product::class,
    'attribute' => [
        'model' => \Modules\Product\Models\Attribute::class,
        'value_model' => \Modules\Product\Models\AttributeValue::class,
    ],
    'variant' => [
        'model' => \Modules\Product\Models\Variant::class,
        'value_model' => \Modules\Product\Models\VariantValue::class,
    ],

    'has_stock' => true,   //the stock column must be called stock with numeric type (used in filament order form for max quantity)

    'tenant' => [
        'model' => null,
    ],
    'options' => [
        'most_view' => true,
        'top_rated' => true,
        'best_seller' => true,

    ],
    /*
    |--------------------------------------------------------------------------
    | Filament Configurations
    |--------------------------------------------------------------------------
    |
    | Mainly this is for extended resources.
    |
    */
    'filament' => [
        'resource_extended' => false,
        'page_extended' => false,
        'widget_extended' => false,
        'show_short_description' => true,
        'resource' => \Modules\Product\Filament\Resources\ProductResource::class
    ],

    'admin' => [
        'index' => [
            "enabled" => false,
        ],
        'show' => [
            'enabled' => false,
        ],
        'store' => [
            "enabled" => false,
        ],

        'update' => [
            "enabled" => false
        ],

        'destroy' => [
            "enabled" => false
        ],
    ]
];
