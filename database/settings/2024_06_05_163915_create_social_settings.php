<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.instagram', 'https://www.instagram.com');
        $this->migrator->add('social.facebook', 'https://www..facebook.com/');
        $this->migrator->add('social.twitter', 'https://www.twitter.com');
        $this->migrator->add('social.youtube', 'https://www.youtube.com');
        $this->migrator->add('social.tiktok', 'https://www.tiktok.com');
        $this->migrator->add('social.linkedin', 'https://www.linkedin.com');
        $this->migrator->add('social.snapchat', 'https://www.snapchat.com');
        $this->migrator->add('social.whatsapp', 'https://wa.me/+20123456789');
        $this->migrator->add('social.phone', '+20123456789');
        $this->migrator->add('social.email', 'support@Test.com');
        $this->migrator->add('social.url', 'https://www.Test.com');
    }
};
