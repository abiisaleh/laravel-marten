<?php

namespace App\Filament\App\Resources\MenuResource\Pages;

use App\Filament\App\Resources\MenuResource;
use App\Filament\App\Resources\MenuResource\Widgets\MenuStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenus extends ListRecords
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            MenuStats::class,
        ];
    }
}
