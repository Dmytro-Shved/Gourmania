<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use App\Models\User;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/27kVSDpF/chef-hat-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/vGfLJsk/chef-hat-icon.png';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ])->columns(2),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->revealable()
                        ->required()
                        ->maxLength(255)
                        ->hiddenOn('edit'),
                    Forms\Components\TextInput::make('password_confirmation')
                        ->password()
                        ->revealable()
                        ->required()
                        ->maxLength(255)
                        ->same('password')
                        ->label('Confirm Password')
                        ->hiddenOn('edit'),
                    Forms\Components\Radio::make('role_id')->name('role')
                        ->options([
                            '1' => 'user',
                            '2' => 'admin',
                        ])->default('1'),
                    Forms\Components\FileUpload::make('photo')
                        ->image()
                        ->hiddenOn('create')
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('role_id'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
