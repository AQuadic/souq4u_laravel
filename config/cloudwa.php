<?php

// config for AQuadic/CLOUDWA
return [

    /*
    |--------------------------------------------------------------------------
    | API TOKEN TO AUTHENTICATE WITH AQ SERVER. (YOU CAN CREATE ONE FROM PROFILE).
    */
    'api_token' => env('CLOUDWA_API_TOKEN', '5441878|WY0eJLK0mgTVhYp9KxB0wnMgW5bRdKzok5irMPDdac33204b'),

    /*
    |--------------------------------------------------------------------------
    | SESSION UUID (THIS IS UNIQUE FOR EACH SESSION).
    */
    'uuids' => [
        'default' => env('CLOUDWA_DEFAULT_SESSION_UUID', ''),
        // add other session here.
    ],

    /*
    |--------------------------------------------------------------------------
    | OTP Number
    */
    'otp' => [
        'shared' => env('CLOUDWA_SHARED_OTP_NUMBERS', true),
        'private' => env('CLOUDWA_OTP_NUMBER', ''),
        'number' => env('CLOUDWA_OTP_NUMBER', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | TEAM ID (THIS IS UNIQUE FOR EACH ACCOUNT).
    */
    'team_id' => env('CLOUDWA_TEAM_ID', '74'),
];
