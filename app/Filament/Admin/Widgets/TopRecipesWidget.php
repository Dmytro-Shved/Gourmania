<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Recipe;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopRecipesWidget extends BaseWidget
{
     protected static ?string $heading = 'Top Recipes';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Recipe::query()
                    ->with(['dishCategory', 'cuisine'])
                    ->popular()
                    ->limit(10)
            )

            ->columns([
                // Id
                TextColumn::make('id')
                    ->label('Id'),

                // Name
                TextColumn::make('name')
                    ->label('Name'),

                // Image
                ImageColumn::make('image')
                    ->label('Image'),

                //Description
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(30),

                // Cook Time
                TextColumn::make('cook_time')
                    ->label('Cook Time'),

                // Servings
                TextColumn::make('servings')
                    ->label('Servings'),

                // Dish Category
                TextColumn::make('dishCategory.name')
                    ->label('Dish Category'),

                // Dish Subcategory
                TextColumn::make('dishSubcategory.name')
                    ->label('Dish Subcategory')
                    ->placeholder('-')
                    ->alignCenter(),

                // Author name
                TextColumn::make('user.name')
                    ->label('Author'),

                // Cuisine
                TextColumn::make('cuisine.name')
                    ->label('Cuisine'),

                // Menu
                TextColumn::make('menu.name')
                    ->label('Menu')
                    ->placeholder('-')
                    ->alignCenter(),
            ])
            ->paginated(false);
    }
}
