<?php

namespace App\Filament\Widgets;


use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Order\Filament\Resources\OrderResource;

class OrderChart extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';
    protected static ?int $sort = 4;


    protected ?string $defaultFilter = 'month';

    public function getHeading(): string|Htmlable|null
    {
        return __('Orders');
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => __('Today'),
            'week'  => __('This Week'),
            'month' => __('This Month'),
            'year'  => __('This Year'),
        ];
    }

    protected function getData(): array
    {

        if (!$this->filter) {
            $this->filter = $this->defaultFilter;
        }
        $filter = $this->filter ?? $this->defaultFilter;
        $query = OrderResource::getEloquentQuery();

        [$start, $end] = match ($filter) {
            'today'  => [now()->startOfDay(), now()->endOfDay()],
            'week'   => [now()->startOfWeek(), now()->endOfWeek()],
            'year'   => [now()->startOfYear(), now()->endOfYear()],
            'month', null => [now()->startOfMonth(), now()->endOfMonth()]
        };

        $data = Trend::query($query)
            ->between(start: $start, end: $end)
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('Orders'),
                    'data'  => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
