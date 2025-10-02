<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
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

    public static function group(): string
    {
        return 'social';
    }
}
