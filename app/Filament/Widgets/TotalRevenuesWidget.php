<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Modules\Order\Filament\Resources\OrderResource;
use Modules\Order\Models\Order;

class TotalRevenuesWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 6;


    public function table(Tables\Table $table): Tables\Table
    {
        return $table

            ->heading(__('Last Orders'))
            ->query(Order::latest()->limit(5))
            ->columns(OrderResource::table($table)->getColumns())
            ->actions([])
            ->bulkActions([])
            ->searchable(false)
            ->filters([])
            ->paginated(false);
    }
}
