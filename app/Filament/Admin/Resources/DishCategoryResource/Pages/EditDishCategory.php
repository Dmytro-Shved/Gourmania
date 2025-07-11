<?php

namespace App\Filament\Admin\Resources\DishCategoryResource\Pages;

use App\Filament\Admin\Resources\DishCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDishCategory extends EditRecord
{
    protected static string $resource = DishCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
