<?php

return [
    'name' => 'Cart',

    'model' => Modules\Cart\Models\CartItem::class,

    'tax' => 0,

    'tax_type'=>'external',         //internal or external used in tax calculation

    'allow_guest' => true,

    'tenant' => [
        'model' => null,
    ],
];
