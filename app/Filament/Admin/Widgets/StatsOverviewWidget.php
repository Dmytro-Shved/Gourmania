<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Cuisine;
use App\Models\Recipe;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Recipes
            Stat::make('Recipes', Recipe::count())
                ->description($this->getMonthlyComparison(Recipe::class))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('cyan'),

            // Users
            Stat::make('Authors', User::count())
                ->description($this->getMonthlyComparison(User::class))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('olive'),

            // Cuisines
            Stat::make('Cuisines', Cuisine::count())
                ->description($this->getMonthlyComparison(Cuisine::class))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('golden'),
        ];
    }

    protected function getMonthlyComparison(string $model): string
    {
        $current = $model::where('created_at', '>=', now()->startOfMonth())->count();
        $previous = $model::whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])->count();

        $percentage = $this->getPercentageChange($current, $previous);

        return "For this month: {$current} ({$percentage})";
    }

    protected function getPercentageChange(float $current, float $previous): string
    {
        if ($previous == 0) return $current > 0 ? '+100%' : '0%';

        $percentage = (($current - $previous) / $previous) * 100;
        return ($percentage >= 0 ? '+' : '') . number_format($percentage, 1) . '%';
    }
}
