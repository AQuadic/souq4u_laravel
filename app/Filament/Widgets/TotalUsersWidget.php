<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Facades\Filament;

class TotalUsersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('Count Admins'),config('admin.model')::count()),
            Stat::make(__('Count Users'), \App\Models\User::count()),
            Stat::make(__('Count Products'),config('product.model')::count()),
        ];
    }
}
