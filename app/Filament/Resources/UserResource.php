<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Members';

    // public static  function shouldRegisterNavigation(): bool {
        // return auth('admin')->user()->type === AdminTypes::SUPER_ADMIN->value;
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username'),
                TextInput::make('email'),
                TextInput::make('firstname'),
                TextInput::make('lastname'),
                TextInput::make('country'),
                // TextInput::make('topup_balance')
                //     ->prefix('$')
                //     ->mask(RawJs::make('$money($input)'))
                //     ->stripCharacters(',')
                //     ->numeric()
                //     ->default(0.00),
                DatePicker::make('dob'),
                TextInput::make('place_of_birth'),
                TextInput::make('residential_address'),
                TextInput::make('city'),
                TextInput::make('postal_code'),
                TextInput::make('occupation'),
                // Select::make('country')
                //     ->options(function() {
                //         $countries = config('countries');
                //         return array_combine(
                //             array_keys($countries), 
                //             array_column($countries, 'name')
                //         );
                //     })
                //     ->searchable()
                //     ->native(false),
                // TextInput::make('language'),
                TextInput::make('address'),
                TextInput::make('phone'),
                TextInput::make('password')
                ->hiddenOn('edit'),
                DatePicker::make('created_at')
                    ->label('Registration date')
                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->label('Verification Date'),
                TextColumn::make('firstname')
                    ->searchable(),
                TextColumn::make('lastname')
                    ->searchable(),
                TextColumn::make('country')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Registration Date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('suspend')
                ->action(function (User $record) {
                    $record->is_suspended = true;
                    $record->save();
                    Notification::make()
                        ->title('Success')
                        ->iconColor('success')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->body('User suspended successfully')
                        ->send();
                })
                ->hidden(fn (User $record): bool => $record->is_suspended),
                Tables\Actions\Action::make('unsuspend')
                    ->action(function (User $record) {
                        $record->is_suspended = false;
                        $record->save();
                        Notification::make()
                            ->title('Success')
                            ->iconColor('success')
                            ->color('success')
                            ->icon('heroicon-o-check-circle')
                            ->body('User unsuspended successfully')
                            ->send();
                    })
                    ->visible(fn (User $record): bool => $record->is_suspended),
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
