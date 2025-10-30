<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.subscription_pop_up_duration', '5');
        $this->migrator->add('social.area_id', '');
        $this->migrator->add('social.details', '');
        $this->migrator->add('social.city_id', '');
        $this->migrator->add('social.country_id', '');
        $this->migrator->add('social.location', []);

    }
};
