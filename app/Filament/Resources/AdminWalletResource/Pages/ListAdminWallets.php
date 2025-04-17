<?php

namespace App\Filament\Resources\AdminWalletResource\Pages;

use App\Filament\Resources\AdminWalletResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminWallets extends ListRecords
{
    protected static string $resource = AdminWalletResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
