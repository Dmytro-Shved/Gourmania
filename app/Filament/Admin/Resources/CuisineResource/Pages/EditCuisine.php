<?php

namespace App\Filament\Admin\Resources\CuisineResource\Pages;

use App\Filament\Admin\Resources\CuisineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuisine extends EditRecord
{
    protected static string $resource = CuisineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
