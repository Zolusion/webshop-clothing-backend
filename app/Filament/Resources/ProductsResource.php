<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')
                    ->required()
                    ->placeholder('ID'),
                TextInput::make('imageUrl')
                    ->required()
                    ->placeholder('Image URL'),
                TextInput::make('productName')
                    ->required()
                    ->placeholder('Product Name'),
                TextInput::make('description')
                    ->required()
                    ->placeholder('Description'),
                TextInput::make('category')
                    ->required()
                    ->placeholder('Category'),
                TextInput::make('categoryId')
                    ->required()
                    ->placeholder('Category ID'),
                TextInput::make('oldPrice')
                    ->required()
                    ->placeholder('Old Price'),
                TextInput::make('newPrice')
                    ->required()
                    ->placeholder('New Price'),
                TextInput::make('quantity')
                    ->required()
                    ->placeholder('Quantity'),
                TextInput::make('slug')
                    ->required()
                    ->placeholder('Slug'),
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
                TextColumn::make('imageUrl'),
                TextColumn::make('productName'),
                TextColumn::make('description'),
                TextColumn::make('category'),
                TextColumn::make('categoryId'),
                TextColumn::make('oldPrice'),
                TextColumn::make('newPrice'),
                TextColumn::make('quantity'),
                TextColumn::make('slug'),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
