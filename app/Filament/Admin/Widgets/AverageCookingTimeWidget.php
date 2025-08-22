<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Recipe;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AverageCookingTimeWidget extends BaseWidget
{
    protected static ?int $sort = 5;

    protected function getStats(): array
    {
        $averageSeconds = Recipe::selectRaw('AVG(TIME_TO_SEC(cook_time)) as avg_seconds')
            ->value('avg_seconds');

        $averageTime = gmdate('H:i', $averageSeconds);

        return [
            Stat::make("Cooking Time", $averageTime)
                ->description('Average Cooking Time (overall)')
                ->descriptionIcon('heroicon-m-clock')
                ->color('primary'),
        ];
    }
}
