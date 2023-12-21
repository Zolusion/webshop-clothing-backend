<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobsResource\Pages;
use App\Filament\Resources\JobsResource\RelationManagers;
use App\Models\Jobs;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobsResource extends Resource
{
    protected static ?string $model = Jobs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // full name
                TextInput::make('Full name')->required()->placeholder('John Doe'),
                TextInput::make('Instagram handle')->required()->placeholder('@johndoe'),
                TextInput::make('Email')->required()->placeholder('b2nZc@example.com'),
                TextInput::make('Location')->required()->placeholder('Amsterdam, Netherlands'),
                TextInput::make('Why you are an ambassador')->required()->placeholder('I want to be an ambassador for the brand'),
                TextInput::make('Experience or skills')->required()->placeholder('I have experience in...'),
                TextInput::make('How to promote your brand')->required()->placeholder('I want to promote my brand through...'),
                TextInput::make('Additional comments')->required()->placeholder('Additional comments'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Full name'),
                TextColumn::make('Instagram handle'),
                TextColumn::make('Email'),
                TextColumn::make('Location'),
                TextColumn::make('Why you are an ambassador'),
                TextColumn::make('Experience or skills'),
                TextColumn::make('How to promote your brand'),
                TextColumn::make('Additional comments'),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJobs::route('/create'),
            'edit' => Pages\EditJobs::route('/{record}/edit'),
        ];
    }
}
