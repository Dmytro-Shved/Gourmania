<?php

namespace App\Filament\Admin\Resources\RecipeResource\Pages;

use App\Filament\Admin\Resources\RecipeResource;
use App\Models\GuideStep;
use App\Models\Ingredient;
use Dflydev\DotAccessData\Data;
use Filament\Actions\Action;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateRecipe extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = RecipeResource::class;

    public function getSteps(): array
    {
        return [
          Step::make('Info')->schema(RecipeResource::getInfo()),
          Step::make('Ingredients')->schema(RecipeResource::getIngredients()),
          Step::make('Guide')->schema(RecipeResource::getGuide()),
        ];
    }
}
