<?php

namespace App\Filament\Admin\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;

class ProfileRelationManager extends RelationManager
{
    protected static string $relationship = 'profile';
    protected static ?string $recordTitleAttribute = 'user.name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Grid::make()->schema([
                   Select::make('gender')
                       ->label('Gender')
                       ->options([
                           'male' => 'Male',
                           'female' => 'Female'
                       ])
                       ->nullable(),
                   DatePicker::make('birth_date')
                       ->label('Birth Date')
                       ->placeholder('-')
                       ->nullable(),
               ]),
                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('No bio yet...')
                    ->columnSpanFull()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                TextColumn::make('user_id')->label('User Id'),
                TextColumn::make('gender')
                    ->badge()
                    ->color(fn ($record) => match($record->gender) {
                        'male' => Color::hex('#410af5'),
                        'female' => Color::hex('#ff80ec'),
                        default => 'primary'
                    })
                    ->placeholder('-'),
                TextColumn::make('birth_date')
                    ->date('Y-m-d')
                    ->placeholder('-'),
                TextColumn::make('description')
                    ->limit(30)
                    ->placeholder('-'),
                TextColumn::make('created_at')
                    ->label('Joined')
                    ->date('Y-m-d')
                    ->placeholder('-'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }
}
