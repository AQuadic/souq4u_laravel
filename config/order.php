<?php

return [
    'name' => 'Order',
    'enable_card_payments' => true,
    'enable_cash_payments' => true,
    'tenant' => [
        'model' => null,
    ],
    'order' =>[
        'model' => \Modules\Order\Models\Order::class,
        'resource' => \Modules\Order\Http\Resources\OrderResource::class,
        'filament'=>[
            'show_email' => true
        ]
    ],

    'order_item' =>[
        'model' => \Modules\Order\Models\OrderItem::class,
        'resource' => \Modules\Order\Http\Resources\OrderItemResource::class
    ],

    'order_track' =>[
        'model' => \Modules\Order\Models\OrderTrack::class,
        'resource' => \Modules\Order\Http\Resources\OrderTrackResource::class,
        'guards' => [
            'users',
            'web',
        ],
        // the number of requests per minute that can be made
        //$maxPerMinute = max(1, floor(60 / <<throttle_seconds>>));
        // that's 6 requests per minute limit
        'throttle_seconds' => 10
    ],

    'payment_attempt' =>[
        'model' => \Modules\Order\Models\PaymentAttempt::class,
    ],
    'allow_guest' => true,

    'filament' => [
        'navigation_group' => 'Order',
        'resource_extended' => false,
        'page_extended' => false,
        'widget_extended' => false,
        'resource' => \Modules\Order\Filament\Resources\OrderResource::class,
        'ship_order_action' => [
            'enabled' => true
        ],
        'show_email_in_filament' => true
    ],

    'payment_gateways' =>[
        'amazon_pay' => [
            'enabled' => false,
            'command' => 'Purchase',
            'access_code' => 'TzsRK5urvRx59FgOAklN',
            'merchant_identifier' => 'RDTkQFpI',
            'currency' => 'USD',
            'iso_code_multiplier' => 100,
            'language' => 'en',
            'sha_request_passphrase' => '14Tijjjp1hFLdz2ES.7PyN{#',
            'sha_response_passphrase' => '23LanfMfusy9U643NB02Me+}',
            'sanbox_url' => 'https://sbcheckout.payfort.com/FortAPI',
            'live_url' => 'https://checkout.payfort.com/FortAPI',
        ]
    ]

];

