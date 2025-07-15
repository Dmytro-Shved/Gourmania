<?php

namespace App\Filament\Admin\Resources\RecipeResource\Pages;

use App\Filament\Admin\Resources\RecipeResource;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;

class CreateRecipe extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = RecipeResource::class;

    public function getSteps(): array
    {
        return [
          Step::make('Info')->schema(RecipeResource::getInfo()),
          Step::make('Ingredients')->schema(RecipeResource::getIngredinets()),
          Step::make('Guide')->schema(RecipeResource::getGuide()),
        ];
    }
}
