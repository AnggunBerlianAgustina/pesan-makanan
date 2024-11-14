<?php

namespace App\Filament\Resources\MenuResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Menu;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Menu', Menu::query()->count())
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            ];
    }
}
