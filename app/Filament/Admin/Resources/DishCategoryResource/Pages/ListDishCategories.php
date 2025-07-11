<?php

namespace App\Filament\Admin\Resources\DishCategoryResource\Pages;

use App\Filament\Admin\Resources\DishCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDishCategories extends ListRecords
{
    protected static string $resource = DishCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
