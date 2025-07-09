<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use App\Models\Role;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'https://i.ibb.co/27kVSDpF/chef-hat-inactive.png';
    protected static ?string $activeNavigationIcon = 'https://i.ibb.co/vGfLJsk/chef-hat-icon.png';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    FileUpload::make('photo')
                        ->image()
                        ->hiddenOn('create')
                        ->avatar()
                        ->imagePreviewHeight(50)
                        ->imageEditorEmptyFillColor('#ffffff')
                        ->imageCropAspectRatio('1:1')->alignCenter(),
                    TextInput::make('name')->required(),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true),
                    TextInput::make('password')
                        ->password()
                        ->revealable()
                        ->required()
                        ->maxLength(255)
                        ->hiddenOn('edit'),
                    TextInput::make('password_confirmation')
                        ->password()
                        ->revealable()
                        ->required()
                        ->maxLength(255)
                        ->same('password')
                        ->label('Confirm Password')
                        ->hiddenOn('edit'),
                    Select::make('role_id')
                        ->label('Role')
                        ->relationship('role', 'name')
                        ->required(),
                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('photo')->circular(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('role.name')->sortable()->searchable()
                    ->label('Role')
                    ->badge()
                    ->color(fn ($record) => match($record->role_id) {
                        Role::IS_ADMIN => 'info',
                        default => 'primary'
                    }),
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
            RelationManagers\ProfileRelationManager::class,
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
