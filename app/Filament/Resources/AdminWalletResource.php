<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminWalletResource\Pages;
use App\Models\AdminWallet;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdminWalletResource extends Resource
{
    protected static ?string $model = AdminWallet::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';
    // protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Wallets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('symbol'),
                TextInput::make('name')
                    ->label('Wallet Name'),
                TextInput::make('address')
                 ->label('Wallet Address'),
                TextInput::make('coin')
                    ->label('Icon Name'),
                TextInput::make('path')
                    ->label('Icon Path')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Wallet Name')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                TextColumn::make('symbol')
                    ->formatStateUsing(fn ($state) => strtoupper($state)),
                TextColumn::make('address')
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                TextColumn::make('updated_at')
                    ->label('Last Updated At'),

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
            'index' => Pages\ListAdminWallets::route('/'),
            'create' => Pages\CreateAdminWallet::route('/create'),
            'edit' => Pages\EditAdminWallet::route('/{record}/edit'),
        ];
    }
}
