<?php

namespace App\Filament\Admin\Resources\IngredientResource\Pages;

use App\Filament\Admin\Resources\IngredientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIngredient extends CreateRecord
{
    protected static string $resource = IngredientResource::class;
}
