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
    'name' => 'User',
    'model' => \App\Models\User::class,
    'policy' => \Modules\User\Policies\UserPolicy::class,
    'model_label' => 'users',
    'tenant' => [
        'model' => null,
        'scope' => false,
    ],
    /*
    |--------------------------------------------------------------------------
    | Signup:
    |--------------------------------------------------------------------------
    |
    | General Settings For SignUp.
    |
    */
    'signup' => [
        'enabled' => true,
        'password' => false, // is Password required for signup ?, or login via OTP for example.
    ],

    /*
    |--------------------------------------------------------------------------
    | Login:
    |--------------------------------------------------------------------------
    |
    | General Settings For Login.
    |
    */
    'login' => [
        'enabled' => true,
        'create' => true,
        'password' => false, // is Password required for signup ?, or login via OTP for example.
        'single' => false, // TODO: Coming Soon.
        'block' => true, // TODO: Coming Soon.
    ],

    'resource' => [
        'enabled' => false,
        'class' => \Modules\User\Http\Resources\UserResource::class
    ],

    'firebase' => [
        'enabled' => true,
        'create' => true,
    ],

    'social' => [
        'enabled' => true,
        'apple_id' => null,
    ],

    'verify' => [
        'enabled' => true,
    ],

    'forgot' => [
        'enabled' => true,
        'redirect' => '/',
    ],

    'change_password' => [
        'enabled' => true,
    ],

    'otp_check' => [
        'enabled' => true,
    ],
    'otp_cloudwa' => [
        'enabled' => true,
    ],
    'resend' => [
        'enabled' => true,
    ],

    'user' => [
        'enabled' => true,
    ],

    'logout' => [
        'enabled' => true,
    ],

    'update' => [
        'enabled' => true,
    ],

    'destroy' => [
        'enabled' => true,
        'require_password' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Email:
    |--------------------------------------------------------------------------
    |
    | Choose one of the following Values:
    | - Validation: 'required' 'nullable' 'sometimes'
    | - Unique: true, false
    |
    */
    'email' => [
        'validation' => 'sometimes', // determined in form request.
        'unique' => true, // determined in controller not form request.
        'domains' => [], // TODO: List of allowed domains only, Coming soon.
        'validate_on_update' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Phone:
    |--------------------------------------------------------------------------
    |
    | Choose one of the following Values:
    | - Validation: 'required' 'nullable' 'sometimes'
    | - Unique: true, false
    |
    */
    'phone' => [
        'validation' => 'required', // determined in form request.
        'unique' => true, // determined in controller not form request.
        'countries' => [], // TODO: List of allowed countries only, Coming Soon.
        'validate_on_update' => true,
    ],

    'filament' => [
        'resource_extended' => false,
        'page_extended' => false,
        'widget_extended' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | OTP Configs:
    |--------------------------------------------------------------------------
    |
    */
    'otp' => [
        'length' => 6,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin:
    |--------------------------------------------------------------------------
    |
    */
    'admin' => [
        'index' => [
            'enabled' => false,
        ],
        'show' => [
            'enabled' => false,
        ],
        'store' => [
            'enabled' => false,
        ],
        'update' => [
            'enabled' => false,
        ],
        'destroy' => [
            'enabled' => false,
        ],
    ],
];
