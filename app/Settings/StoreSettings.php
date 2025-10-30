<?php

namespace App\Settings;

use MatanYadaev\EloquentSpatial\Objects\Point;
use Spatie\LaravelSettings\Settings;

class StoreSettings extends Settings
{
    public ?string $url;

    public ?string $snapchat;

    public ?string $instagram;

    public ?string $facebook;

    public ?string $tiktok;

    public ?string $linkedin;

    public ?string $youtube;

    public ?string $twitter;

    public ?string $whatsapp;

    public ?string $phone;

    public ?string $email;

    public ?int $subscription_pop_up_duration   ;
    public ?int $area_id   ;
    public ?int $city_id   ;
    public ?int $country_id   ;
    public ?string $details   ;
    public ?array $location   ;


    public static function group(): string
    {
        return 'social';
    }
}
