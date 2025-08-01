<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DishSubcategoryResource\Pages;
use App\Filament\Admin\Resources\DishSubcategoryResource\RelationManagers;
use App\Models\DishCategory;
use App\Models\DishSubcategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DishSubcategoryResource extends Resource
{
    protected static ?string $model = DishSubcategory::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/7tvw8nck/dish-subcategories-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/8g7mc8J2/dish-subcategories-icon.png';
    protected static ?string $navigationGroup = 'Dish Categories';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('dish_category_id')
                    ->label('Category')
                    ->options(function (){
                        return DishCategory::get()->pluck('name', 'id')->toArray();
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('dishCategory.name')
                    ->label('Dish Category')
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
            'index' => Pages\ListDishSubcategories::route('/'),
            'create' => Pages\CreateDishSubcategory::route('/create'),
            'edit' => Pages\EditDishSubcategory::route('/{record}/edit'),
        ];
    }
}
