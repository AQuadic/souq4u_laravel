<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Facades\Filament;

class TotalOrdersWidget extends BaseWidget
{

    protected function getStats(): array
    {
        $totalCompletedRevenue = config('order.order.model', \Modules\Order\Models\Order::class)::where('status', 'completed')->sum('total');
        $totalNotCompletedRevenue = config('order.order.model', \Modules\Order\Models\Order::class)::whereNot('status', 'completed')->sum('total');
        return [
            Stat::make(__('Count Orders'), config('order.order.model', \Modules\Order\Models\Order::class)::count()),
            Stat::make(__('Total Revenues'), number_format($totalCompletedRevenue, 2)   )
                ->description(__('Total Revenues'))
                ->color('success'),
            Stat::make(__('Total Revenues'), number_format($totalNotCompletedRevenue, 2)  )
                ->description(__('Total pending revenues'))
                ->color('danger'),
        ];
    }
}
