<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HomepageSectionResource\Pages;
use App\Filament\Admin\Resources\HomepageSectionResource\RelationManagers;
use App\Models\DishCategory;
use App\Models\HomepageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class HomepageSectionResource extends Resource
{
    protected static ?string $model = HomepageSection::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/G4bwQK95/homepage-section-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/W4smQ9c1/homepage-section-icon.png';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //  Name
                Forms\Components\TextInput::make('name')
                    ->unique(ignoreRecord: true)
                    ->required(),

                // Slug
                Forms\Components\TextInput::make('slug')->hidden(),

                // Type
                Forms\Components\Select::make('type')
                    ->required()
                    ->options([
                        'popular' => 'Popular Recipes',
                        'latest' => 'Latest Recipes',
                        'category' => 'Category Based',
                    ])
                    ->live()
                    ->afterStateUpdated(fn (Forms\Set $set) => $set('category_slug', null)),

                // Dish Category slug
                Forms\Components\Select::make('category_slug')
                    ->label('Category')
                    ->options(fn () => DishCategory::pluck('name', 'slug'))
                    ->visible(fn (Forms\Get $get) => $get('type') === 'category')
                    ->required(fn (Forms\Get $get) => $get('type') === 'category'),

                // Order
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(fn () => HomepageSection::max('order') + 1)
                    ->minValue(1),

                // Limit
                Forms\Components\TextInput::make('limit')
                    ->required()
                    ->numeric()
                    ->default(4)
                    ->minValue(1)
                    ->maxValue(20)
                    ->helperText('Number of recipes to display in this section'),

                // Visible
                Forms\Components\Toggle::make('visible')
                    ->label('Show on Homepage')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Order
                Tables\Columns\TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->width(60),

                // Name
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                // Type
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'popular' => 'success',
                        'latest' => 'info',
                        'category' => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'popular' => 'Popular',
                        'latest' => 'Latest',
                        'category' => 'Category',
                    }),

                // Dish Category slug
                Tables\Columns\TextColumn::make('category_slug')
                    ->label('Dish Category')
                    ->getStateUsing(function ($record) {
                        if ($record->type === 'category' && $record->category_slug) {
                            $dishCategory = DishCategory::where('slug', $record->category_slug)->first();
                            return $dishCategory?->name ?? $record->category_slug;
                        }
                        return '-';
                    })
                    ->placeholder('-'),

                // Limit
                Tables\Columns\TextColumn::make('limit')
                    ->label('Limit')
                    ->alignCenter(),

                // Visible
                Tables\Columns\ToggleColumn::make('visible')
                    ->label('Visible')
                    ->alignCenter(),

                // Timestamps
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->reorderable('order')
            ->defaultSort('order')

            // Filters
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'popular' => 'Popular',
                        'latest' => 'Latest',
                        'category' => 'Category',
                    ]),
                Tables\Filters\TernaryFilter::make('visible')
                    ->label('Visibility')
                    ->placeholder('All sections')
                    ->trueLabel('Visible sections')
                    ->falseLabel('Hidden sections'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageSections::route('/'),
            'create' => Pages\CreateHomepageSection::route('/create'),
            'edit' => Pages\EditHomepageSection::route('/{record}/edit'),
        ];
    }
}
