<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Filament\Resources\CartResource\RelationManagers;
use App\Models\Cart;
use App\Models\Carts;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('product_image')
                    ->required()
                    ->placeholder('https://example.com/image.png'),
                TextInput::make('product_name')
                    ->required()
                    ->placeholder('Product Name'),
                TextInput::make('product_price')
                    ->required()
                    ->placeholder('0.00'),
                TextInput::make('quantity')
                    ->required()
                    ->placeholder('25'),
                TextInput::make('customer_name')
                    ->required()
                    ->placeholder('John Doe'),
                TextInput::make('customer_email')
                    ->required()
                    ->email()
                    ->placeholder('b2nZc@example.com'),
                TextInput::make('customer_phone')
                    ->required()
                    ->placeholder('0612345678'),
                TextInput::make('customer_address')
                    ->required()
                    ->placeholder('voordeelstraat 1'),
                TextInput::make('customer_city')
                    ->required()
                    ->placeholder('Amsterdam'),
                TextInput::make('customer_country')
                    ->required()
                    ->placeholder('Netherland'),
                TextInput::make('customer_zipcode')
                    ->required()
                    ->placeholder('0000AB'),
                Select::make('shipping_method')
                    ->required()
                    ->options([
                        'postnl' => 'PostNL',
                        'dhl' => 'DHL Parcel',
                        'fedex' => 'FedEx',
                        'dpd' => 'DPD Parcel',
                        'ups' => 'UPS',
                        'gls' => 'GLS Parcel',
                    ])
                    ->placeholder('Select Shipping Method'),

                Select::make('payment_method')
                    ->required()
                    ->options([
                        'iDeal' => 'iDEAL',
                        'creditCard' => 'Credit Card',
                        'bankTransfer' => 'Bank Transfer',
                        'paypal' => 'PayPal',
                        'contactless_payment' => 'Contactless Payment',
                        'bancontact' => 'Bancontact',
                    ])
                    ->placeholder('Select Payment Method'),
                TextInput::make('total_price')
                    ->required()
                    ->placeholder('0.00'),
                Select::make('order_status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'canceled' => 'Canceled',
                    ])
                    ->placeholder('Select Order Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_image')
                    ->label('Product Image')
                    ->toggleable(),
                TextColumn::make('product_name')
                    ->label('Product Name')
                    ->toggleable(),
                TextColumn::make('product_price')
                    ->label('Product Price')
                    ->toggleable(),
                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->toggleable(),
                TextColumn::make('customer_name')
                    ->label('Customer Name')
                    ->toggleable(),
                TextColumn::make('customer_email')
                    ->label('Customer Email')
                    ->toggleable(),
                TextColumn::make('customer_phone')
                    ->label('Customer Phone')
                    ->toggleable(),
                TextColumn::make('customer_address')
                    ->label('Customer Address')
                    ->toggleable(),
                TextColumn::make('customer_city')
                    ->label('Customer City')
                    ->toggleable(),
                TextColumn::make('customer_country')
                    ->label('Customer Country')
                    ->toggleable(),
                TextColumn::make('customer_zipcode')
                    ->label('Customer Zipcode')
                    ->toggleable(),
                TextColumn::make('shipping_method')
                    ->label('Shipping Method')
                    ->toggleable(),
                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->toggleable(),
                TextColumn::make('total_price')
                    ->label('Total Price')
                    ->toggleable(),
                TextColumn::make('order_status')
                    ->label('Order Status')
                    ->toggleable(),
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
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCart::route('/create'),
            'edit' => Pages\EditCart::route('/{record}/edit'),
        ];
    }
}
