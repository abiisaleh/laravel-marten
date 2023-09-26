<?php

namespace App\Filament\App\Resources\MenuResource\Widgets;

use App\Filament\App\Resources\MenuResource\Pages\ListMenus;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MenuStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListMenus::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Menu', $this->getPageTableQuery()->count()),
            Stat::make('Total Makanan', $this->getPageTableQuery()->where('jenis','makanan')->count()),
            Stat::make('Total Minuman', $this->getPageTableQuery()->where('jenis','minuman')->count()),
        ];
    }
}
