<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShoppingCartResource\Pages;
use App\Filament\Resources\ShoppingCartResource\RelationManagers;
use App\Models\ShoppingCart;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShoppingCartResource extends Resource
{
    protected static ?string $model = ShoppingCart::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('product_image')->required()->placeholder('Enter image URL'),
                TextInput::make('product_name')->required()->placeholder('Enter title'),
                TextInput::make('product_price')->required()->placeholder('Enter description'),
                TextInput::make('quantity')->required(),
                TextInput::make('slug')->required(),
                TextInput::make('customer_name')->required(),
                TextInput::make('customer_email')->required(),
                TextInput::make('customer_phone')->required(),
                TextInput::make('customer_address')->required(),
                TextInput::make('customer_city')->required(),
                TextInput::make('customer_country')->required(),
                TextInput::make('customer_zipcode')->required(),
                TextInput::make('shipping_method')->required(),
                TextInput::make('payment_method')->required(),
                TextInput::make('shipping_cost')->required(),
                TextInput::make('totalprice')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('product_image')->sortable(),
                TextColumn::make('product_name')->sortable(),
                TextColumn::make('product_price')->sortable(),
                TextColumn::make('quantity')->sortable(),
                TextColumn::make('slug')->sortable(),
                TextColumn::make('customer_name')->sortable(),
                TextColumn::make('customer_email')->sortable(),
                TextColumn::make('customer_phone')->sortable(),
                TextColumn::make('customer_address')->sortable(),
                TextColumn::make('customer_city')->sortable(),
                TextColumn::make('customer_country')->sortable(),
                TextColumn::make('customer_zipcode')->sortable(),
                TextColumn::make('shipping_method')->sortable(),
                TextColumn::make('payment_method')->sortable(),
                TextColumn::make('shipping_cost')->sortable(),
                TextColumn::make('totalprice')->sortable(),
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
            'index' => Pages\ListShoppingCarts::route('/'),
            'create' => Pages\CreateShoppingCart::route('/create'),
            'edit' => Pages\EditShoppingCart::route('/{record}/edit'),
        ];
    }
}
