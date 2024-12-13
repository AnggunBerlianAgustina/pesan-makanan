<?php

namespace App\Filament\Resources\BuyerMenuResource\Pages;

use App\Filament\Resources\BuyerMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBuyerMenus extends ManageRecords
{
    protected static string $resource = BuyerMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Aksi menambahkan menu di matgi
        ];
    }
}
