<?php

namespace App\Filament\Admin\Resources\IngredientResource\Pages;

use App\Filament\Admin\Resources\IngredientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIngredients extends ListRecords
{
    protected static string $resource = IngredientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
