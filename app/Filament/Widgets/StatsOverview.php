<?php

namespace App\Filament\Widgets;

use App\Models\Cafe;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Cafe', Cafe::all()->count()),
            Stat::make('Total Admin', User::all()->where('is_admin', false)->count()),
            // Stat::make('Average time on page', '3:12'),
        ];
    }
}
