<?php

namespace App\Filament\Resources\CafeResource\Pages;

use App\Filament\Resources\CafeResource;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListCafes extends ListRecords
{
    protected static string $resource = CafeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'active' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('k_suasana', '!=', null)
                    ->orWhere('k_variasi_menu', '!=', null)
                    ->orWhere('k_fasilitas', '!=', null)
                    ->orWhere('k_pelayanan', '!=', null)
                    ->orWhere('k_lokasi', '!=', null)),
            'inactive' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('k_suasana', '=', null)
                    ->orWhere('k_variasi_menu', '=', null)
                    ->orWhere('k_fasilitas', '=', null)
                    ->orWhere('k_pelayanan', '=', null)
                    ->orWhere('k_lokasi', '=', null)),
        ];
    }
}
