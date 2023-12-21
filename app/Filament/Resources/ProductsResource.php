<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Models\Products;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('imageurl')->required()->placeholder('https://via.placeholder.com/150'),
                TextInput::make('productname')->required()->placeholder('Product Name'),
                TextInput::make('description')->required()->placeholder('Product Description'),
                TextInput::make('category')->required()->placeholder('Product Category'),
                TextInput::make('categoryid')->required()->placeholder('Product Category ID'),
                TextInput::make('oldprice')->required()->placeholder('Old Price'),
                TextInput::make('newprice')->required()->placeholder('New Price'),
                TextInput::make('quantity')->required()->placeholder('Quantity'),
                TextInput::make('slug')->required()->placeholder('Slug'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('imageurl'),
                TextColumn::make('productname'),
                TextColumn::make('description'),
                TextColumn::make('category'),
                TextColumn::make('categoryid'),
                TextColumn::make('oldprice'),
                TextColumn::make('newprice'),
                TextColumn::make('quantity'),
                TextColumn::make('slug'),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
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
