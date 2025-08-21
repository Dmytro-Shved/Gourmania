<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Recipe;
use Filament\Widgets\ChartWidget;

class DailyRecipeTrendWidget extends ChartWidget
{
    protected static ?string $heading = 'Daily Recipe Trend (Last 30 Days)';
    protected static ?int $sort = 3;
    protected static ?string $pollingInterval = '120s';

    protected function getData(): array
    {
        $endDate = now();
        $startDate = now()->subDays(29)->startOfDay();

        $dailyRecipe = Recipe::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(id) as recipeCount')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $recipes = [];

        for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()){
            $dateString = $date->format('Y-m-d');
            $labels[] = $date->format('M j');
            $recipes[] = $dailyRecipe->get($dateString)?->recipeCount ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Daily Recipe (number of recipes)',
                    'data' => $recipes,
                    'fill' => true,
                    'tension' => 0.4,
                    'pointHoverRadius' => 6,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true
                ],
            ],
        ];
    }
}
