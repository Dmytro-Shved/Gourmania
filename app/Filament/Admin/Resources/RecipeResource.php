<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RecipeResource\Pages;
use App\Filament\Admin\Resources\RecipeResource\RelationManagers;
use App\Models\DishCategory;
use App\Models\DishSubcategory;
use App\Models\GuideStep;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Unit;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
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
use Filament\Support\Enums\Alignment;

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

    // Get Recipe Info
    public static function getInfo(): array
    {
        return [
            // Image
            FileUpload::make('image')
                ->label('Image')
                ->nullable()
                ->image()
                ->disk('public')
                ->directory('recipes-images')
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
                    ->live()
                    ->label('Dish Category')
                    ->dehydrated(false)
                    ->relationship('dishCategory', 'name')
                    ->required(),

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

    // Get Ingredients
    public static function getIngredients(): array
    {
        return [
            Repeater::make('ingredientRecipe')
                ->label('ingredients')
                ->relationship()
                ->schema([
                    Grid::make(3)->schema([
                        // Ingredient name
                        TextInput::make('ingredient_name')
                            ->label('Ingredient')
                            ->required()
                            ->string()
                            ->maxLength(255),

                        // Ingredient quantity
                        TextInput::make('quantity')
                            ->label('Quantity')
                            ->required()
                            ->numeric()
                            ->minValue(0.1)
                            ->maxValue(999.99),

                        // Ingredient unit
                        Select::make('unit_id')
                            ->label('Unit')
                            ->options(Unit::pluck('name', 'id'))
                            ->required()
                            ->searchable(),
                    ]),
                ])

                // Mutate Ingredients Before Fill Repeater
                // To see ingredient name in the edit form
                ->mutateRelationshipDataBeforeFillUsing(function (array $data): array {
                    if (isset($data['ingredient_id'])) {
                        $data['ingredient_name'] = Ingredient::find($data['ingredient_id'])->name;
                    }
                    return $data;
                })

                // Mutate Before Store in the DB
                ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                    // Prepare Final Ingredients to save into DB
                    return self::prepareIngredient($data);
                })

                ->addActionLabel('Add ingredient')
                ->addActionAlignment(Alignment::End)
                ->reorderable(false)
                ->minItems(1)
                ->maxItems(99)
                ->defaultItems(1)
                ->columnSpan('full'),
        ];
    }

    // Get Guide Steps
    public static function getGuide(): array
    {
        return [
            Repeater::make('steps')
                ->relationship('guideSteps')
                ->label('Steps')
                ->schema([
                    Grid::make(1)->schema([
                        // Step image
                        FileUpload::make('step_image')
                            ->image()
                            ->disk('public')
                            ->directory('guides-images')
                            ->imageEditorEmptyFillColor('#ffffff')
                            ->alignCenter()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Accepted types: JPG, PNG, WEBP'),

                        // Step Number
                        Hidden::make('step_number'),

                        // Step text
                        Textarea::make('step_text')
                            ->required()
                            ->placeholder('First there was an egg...'),
                    ]),
                ])

                // Mutate Steps Before Store in the DB
                ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                    // Prepare Final Ingredients to save into DB
                    return self::prepareStep($data);
                })

                ->addActionAlignment(Alignment::End)
                ->minItems(1)
                ->maxItems(99)
                ->collapsible()
                ->reorderable(false)
                ->orderColumn('step_number')
                ->addActionLabel('Add step')
                ->defaultItems(1)
                ->columnSpan('full'),
        ];
    }

    // Prepare final Ingredient
    public static function prepareIngredient($ingredientData): array
    {
        // Check if the ingredient exists (get the existed one or create and save to database)
        $newOrExistedIngredient = Ingredient::firstOrCreate([
            'name' => trim($ingredientData['ingredient_name']) // Match by name
        ]);

        // Prepare data for pivot table
        $finalIngredient = [
            'ingredient_id' => $newOrExistedIngredient->id,
            'quantity' => $ingredientData['quantity'],
            'unit_id' => $ingredientData['unit_id'],
        ];

        return $finalIngredient;
    }

    // Prepare Step
    public static function prepareStep($stepData): array
    {
        return [
            'step_number' => $stepData['step_number'],
            'step_text' => trim($stepData['step_text']),
            'step_image' => $stepData['step_image'] ?? 'recipes-images/default/default_photo.png',
            'created_at' => now(),
            'updated_at' => now(),
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
