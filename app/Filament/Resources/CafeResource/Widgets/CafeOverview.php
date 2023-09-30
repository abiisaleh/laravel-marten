<?php

namespace App\Filament\Resources\CafeResource\Widgets;

use App\Filament\Resources\CafeResource\Pages\ListCafes;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CafeOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.cafe-resource.widgets.cafe-overview';

    use InteractsWithPageTable;
 
    protected function getTablePage(): string
    {
        return ListCafes::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Cafe', $this->getPageTableQuery()->count()),
            Stat::make('Sudah Dinilai', $this->getPageTableQuery()
                ->where('k_suasana','!=',null)
                ->orWhere('k_variasi_menu','!=',null)
                ->orWhere('k_fasilitas','!=',null)
                ->orWhere('k_pelayanan','!=',null)
                ->orWhere('k_lokasi','!=',null)
                ->count()
            ),
            Stat::make('Belum Dinilai', $this->getPageTableQuery()
                ->where('k_suasana',null)
                ->orWhere('k_variasi_menu',null)
                ->orWhere('k_fasilitas',null)
                ->orWhere('k_pelayanan',null)
                ->orWhere('k_lokasi',null)
                ->count()
            ),
        ];
    }
}
