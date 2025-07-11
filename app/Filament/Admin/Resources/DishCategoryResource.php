<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DishCategoryResource\Pages;
use App\Filament\Admin\Resources\DishCategoryResource\RelationManagers;
use App\Models\DishCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DishCategoryResource extends Resource
{
    protected static ?string $model = DishCategory::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/xKv4q5Rk/dish-categories-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/NdCrPGzv/dish-categories-icon.png';
    protected static ?string $navigationGroup = 'Dish Categories';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->extremePaginationLinks();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDishCategories::route('/'),
            'create' => Pages\CreateDishCategory::route('/create'),
            'edit' => Pages\EditDishCategory::route('/{record}/edit'),
        ];
    }
}
