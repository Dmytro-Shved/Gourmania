<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RecipeResource\Pages;
use App\Filament\Admin\Resources\RecipeResource\RelationManagers;
use App\Models\DishCategory;
use App\Models\DishSubcategory;
use App\Models\Recipe;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TimePicker;
use Illuminate\Support\Collection;

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
                // empty place here
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

    public static function getInfo(): array
    {
        return [
            // Image
            FileUpload::make('image')
                ->label('Image')
                ->nullable()
                ->image()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->helperText('Accepted types: JPG, PNG, WEBP'),

            // Name
            TextInput::make('name')
                ->label('Name')
                ->string()
                ->maxLength(255)
                ->required()
                ->unique(ignoreRecord: true),

            // Description
            Textarea::make('description')
                ->nullable()
                ->string()
                ->rows(3)
                ->maxLength(255)
                ->label('Description'),

            // Dish Category & Dish Subcategory section
            // Dependent dropdown logic
            Section::make('Category & Subcategory')->schema([
                // Dish Category
                Select::make('dish_category_id')
                    ->required()
                    ->live()
                    ->label('Dish Category')
                    ->dehydrated(false)
                    ->options(DishCategory::pluck('name', 'id')),

                // Dish Subcategory
                Select::make('dish_subcategory_id')
                    ->label('Dish Subcategory')
                    ->nullable()
                    ->options(function (Get $get): Collection {
                        return DishSubcategory::where('dish_category_id', $get('dish_category_id'))->pluck('name', 'id');
                    }),
            ]),

            // Cuisine
            Select::make('cuisine_id')
                ->label('Cuisine')
                ->relationship('cuisine', 'name')
                ->required(),

            // Menu
            Select::make('menu_id')
                ->label('Menu')
                ->relationship('menu', 'name')
                ->nullable(),

            // Cook time & Servings grid
            Grid::make(2)->schema([
                // Cook time
                TimePicker::make('cook_time')
                    ->label('Cook Time')
                    ->required()
                    ->seconds(false)
                    ->format('H:i'),

                // Servings
                TextInput::make('servings')
                    ->label('Servings')
                    ->required()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(99),
            ]),
        ];
    }

    public static function getIngredinets(): array
    {
        return [
            //
        ];
    }

    public static function getGuide(): array
    {
        return [
            //
        ];
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
