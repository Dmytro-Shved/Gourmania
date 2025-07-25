<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CuisineResource\Pages;
use App\Filament\Admin\Resources\CuisineResource\RelationManagers;
use App\Models\Cuisine;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CuisineResource extends Resource
{
    protected static ?string $model = Cuisine::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/k2n0dtJx/cuisine-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/Q77BF2W8/cuisine-icon.png';
    protected static ?string $navigationGroup = 'Culinary';
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
            'index' => Pages\ListCuisines::route('/'),
            'create' => Pages\CreateCuisine::route('/create'),
            'edit' => Pages\EditCuisine::route('/{record}/edit'),
        ];
    }
}
