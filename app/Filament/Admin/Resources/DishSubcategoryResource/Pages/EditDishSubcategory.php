<?php

namespace App\Filament\Admin\Resources\DishSubcategoryResource\Pages;

use App\Filament\Admin\Resources\DishSubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDishSubcategory extends EditRecord
{
    protected static string $resource = DishSubcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
