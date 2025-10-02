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
    'name' => 'Address',

    /*
    |--------------------------------------------------------------------------
    | Model Extending
    |--------------------------------------------------------------------------
    |
    | This just example of config, useless.
    |
    */
    'country' => [
        'model' => \Modules\Address\Models\Country::class,
        'resource' => \Modules\Address\Http\Resources\CountryResource::class,
    ],

    'city' => [
        'model' => \Modules\Address\Models\City::class,
        'resource' => \Modules\Address\Http\Resources\CityResource::class,
    ],

    'area' => [
        'model' => \Modules\Address\Models\Area::class,
        'resource' => \Modules\Address\Http\Resources\AreaResource::class,
    ],

    'address' => [
        'model' => \Modules\Address\Models\Address::class,
        'resource' => \Modules\Address\Http\Resources\AddressResource::class,
        'rules' => [
            'address_id' => ['required_without:address_details', 'exists:addresses,id', 'nullable', 'sometimes'],
            'country_id' => ['required_without:address_id'],
            'city_id' => ['required_without:address_id'],
            'area_id' => ['required_without:address_id'],
            'address_lat' => ['required_without:address_id'],
            'address_lng' => ['required_without:address_id', 'numeric', 'between:-90,90'],
            'address_details' => ['required_without:address_id', 'numeric', 'between:-180,180'],
        ],
        'filament' => [
            'show_user' => true
        ]
    ],
    'tenant' => [
        'model' => null,
    ],
    'shipping' => [
        'model' => \Modules\Address\Models\ShippingPrice::class,
        //'resource' => \Modules\Address\Http\Resources\ShippingPriceResource::class,
        // TODO: Need to move those to spatie settings
        'type' => 'internal', //"internal" for shipping price model & price per km or "external" for shipping companies integration
        'mode' => 'region',
        'fallback_enabled' => true,
        'base_price' => 5,
        'rate_per_km' => 0.75,
        'min_price' => null,
        'match_priority' => ['area', 'city', 'country'], //MAKE SURE THAT THESE KEYS MATCH THE MORPH MAP OF THE MODELS
        'from_city_id' => null,
        'from_lat' => null,
        'from_lng' => null,
        'from_type' => 'area',
        'from_id' => 167
    ],

    'shipping_providers' => [
        'bosta',
    ],

    'bosta' => [
        'enabled' => false,
        'api_token' => null,
        'type' => 'SEND',
        'size' => 'Heavy Bulky'
    ],

    /*
    |--------------------------------------------------------------------------
    | Morph Model
    |--------------------------------------------------------------------------
    |
    | Where this slider can be morphed to another model.
    |
    */
    'morphed_models' => [
        'user' => 'name',
    ],

    'filament' => [
        'navigation_group' => 'Address',
        //'resource_extended' => false,
        //'page_extended' => false,
        //'widget_extended' => false,
        'navigation' => [
            'AddressResource' => true,
            'AreaResource' => true,
            'CityResource' => true,
            'CountryResource' => true,
            'ShippingPriceResource' => true,
        ]

    ],

    'admin' => [
        'city' => [
            'index' => ['enabled' => false],
            'show' => ['enabled' => false],
            'store' => ['enabled' => false],
            'update' => ['enabled' => false],
            'destroy' => ['enabled' => false],
        ],
        'country' => [
            'index' => ['enabled' => false],
            'show' => ['enabled' => false],
            'store' => ['enabled' => false],
            'update' => ['enabled' => false],
            'destroy' => ['enabled' => false],
        ],
        'area' => [
            'index' => ['enabled' => false],
            'show' => ['enabled' => false],
            'store' => ['enabled' => false],
            'update' => ['enabled' => false],
            'destroy' => ['enabled' => false],
        ],
        'addresses' => [
            'index' => ['enabled' => false],
            'show' => ['enabled' => false],
            'store' => ['enabled' => false],
            'update' => ['enabled' => false],
            'destroy' => ['enabled' => false],
        ]
    ]
];
