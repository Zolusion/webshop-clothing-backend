<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->placeholder('Name'),
                TextInput::make('surname')
                    ->required()
                    ->placeholder('Surname'),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->placeholder('Email'),
                TextInput::make('city')
                    ->required()
                    ->placeholder('City'),
                TextInput::make('country')
                    ->required()
                    ->placeholder('Country'),
                TextInput::make('street')
                    ->required()
                    ->placeholder('Street'),
                TextInput::make('zip')
                    ->required()
                    ->placeholder('Zip'),
                TextInput::make('phone')
                    ->required()
                    ->placeholder('Phone'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->placeholder('Password'),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->placeholder('Confirm Password'),
                TextInput::make('role')
                    ->required()
                    ->placeholder('Role'),
                TextInput::make('created_at')
                    ->required()
                    ->placeholder('Created At'),
                TextInput::make('updated_at')
                    ->required()
                    ->placeholder('Updated At'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('surname'),
                TextColumn::make('email'),
                TextColumn::make('city'),
                TextColumn::make('country'),
                TextColumn::make('street'),
                TextColumn::make('zip'),
                TextColumn::make('phone'),
                TextColumn::make('role'),
                TextColumn::make('created_at'),
                TextColumn::make('updated_at'),
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
