<?php

namespace App\Filament\Admin\Widgets;

use App\Models\DishCategory;
use Filament\Widgets\ChartWidget;

class RecipeByDishCategoryWidget extends ChartWidget
{
    protected static ?string $heading = 'Recipe by Category';
    protected static ?int $sort = 2;
    protected static ?string $pollingInterval = '60s';

    protected function getData(): array
    {
        $categories = DishCategory::withCount('recipes')
            ->orderBy('name')
            ->get();

        $labels = $categories->pluck('name')->toArray();
        $data = $categories->pluck('recipes_count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Recipe by Category',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
