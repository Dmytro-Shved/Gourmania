<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RecipeResource\Pages;
use App\Filament\Admin\Resources\RecipeResource\RelationManagers;
use App\Models\Recipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/TBk3kBZ4/recipe-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/d038P4PZ/recipe-icon.png';
    protected static ?string $navigationGroup = 'Recipes';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(30),
                TextColumn::make('cook_time')
                    ->label('Cook Time')
                    ->sortable(),
                TextColumn::make('servings')
                    ->label('Servings')
                    ->sortable(),
                TextColumn::make('dishCategory.name')
                    ->label('Dish Category')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('dishSubcategory.name')
                    ->label('Dish Subcategory')
                    ->placeholder('-')
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Author')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('cuisine.name')
                    ->label('Cuisine')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('menu.name')
                    ->label('Menu')
                    ->placeholder('-')
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
