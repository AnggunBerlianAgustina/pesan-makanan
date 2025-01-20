<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\MenuResource\Widgets\StatsOverview;

class ManageMenus extends ManageRecords
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Menu')
                ->modalSubmitActionLabel('Simpan')
                ->modalHeading('Tambah Menu Baru')
                ->modalCancelActionLabel('Batal')
                ->createAnother(false),

            Actions\Action::make('Lihat Menu')
                ->label('view')
                ->color('success')
                ->icon('heroicon-o-eye')
                ->url(route('menu.index')) // Pastikan route 'menu.index' sudah didefinisikan
                ->openUrlInNewTab(), // Buka di tab baru
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
