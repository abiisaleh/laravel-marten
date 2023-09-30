<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CafeResource\Pages;
use App\Filament\Resources\CafeResource\RelationManagers;
use App\Filament\Resources\CafeResource\RelationManagers\MenuRelationManager;
use App\Filament\Resources\CafeResource\Widgets\CafeOverview;
use App\Models\Cafe;
use App\Models\subkriteria;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\File;

class CafeResource extends Resource
{
    protected static ?string $model = Cafe::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $pluralLabel = 'Cafe';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Placeholder::make('nama')
                            ->content(fn (Cafe $record): ?string => $record->nama),
                        // Placeholder::make('pemilik')
                        //     ->content(fn (Cafe $record): ?string => $record->members()->toArray()[0]['name'].' ('.$record->members()->toArray()[0]['email'].')'),
                        Placeholder::make('alamat')
                            ->content(fn (Cafe $record): ?string => $record->alamat.', Kel. '.$record->kelurahan.', Kec. '.$record->kecamatan),
                        Placeholder::make('Total Menu')
                            ->content(fn (Cafe $record): ?string => $record->menu()->count()),
                    ])
                    ->columnSpan(['lg' => 1]),
                
                Section::make('Kriteria Penilaian')
                    ->schema([
                        Select::make('k_suasana')
                            ->label('Suasana')
                            ->options(
                                subkriteria::where('kriteria_id',1)->pluck('nama','id')
                            )
                            ->native(false),
                        Select::make('k_variasi_menu')
                            ->label('Variasi Menu')
                            ->options(
                                subkriteria::where('kriteria_id',2)->pluck('nama','id')
                            )
                            ->native(false),
                        Select::make('k_fasilitas')
                            ->label('Fasilitas')
                            ->options(
                                subkriteria::where('kriteria_id',3)->pluck('nama','id')
                            )
                            ->native(false),
                        Select::make('k_pelayanan')
                            ->label('Pelayanan')
                            ->options(
                                subkriteria::where('kriteria_id',4)->pluck('nama','id')
                            )
                            ->native(false),
                        Select::make('k_lokasi')
                            ->label('Lokasi')
                            ->options(
                                subkriteria::where('kriteria_id',5)->pluck('nama','id')
                            )
                            ->native(false),
                    ])
                    ->columnSpan(['lg' => 1]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('alamat'),
                TextColumn::make('kelurahan'),
                TextColumn::make('kecamatan'),
            ])
            ->filters([
                Filter::make('Dinilai')
                    ->query(fn (Builder $query): Builder => $query
                        ->where('k_suasana','!=',null)
                        ->orWhere('k_variasi_menu','!=',null)
                        ->orWhere('k_fasilitas','!=',null)
                        ->orWhere('k_pelayanan','!=',null)
                        ->orWhere('k_lokasi','!=',null)
                    )
                    ->checkbox(),
                Filter::make('Belum Dinilai')
                    ->query(fn (Builder $query): Builder => $query
                        ->where('k_suasana',null)
                        ->orWhere('k_variasi_menu',null)
                        ->orWhere('k_fasilitas',null)
                        ->orWhere('k_pelayanan',null)
                        ->orWhere('k_lokasi',null)
                    )
                    ->checkbox(),
                SelectFilter::make('kecamatan')
                    ->options(function() {
                        $data = File::json('kotajayapura.json');
                        foreach ($data as $key => $value) {
                            $options[$key] = $key;
                        }
                        return $options;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            MenuRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCafes::route('/'),
            'create' => Pages\CreateCafe::route('/create'),
            'edit' => Pages\EditCafe::route('/{record}/edit'),
        ];
    }  
    
    public static function getWidgets(): array
    {
        return [
            CafeOverview::class,
        ];
    }
}
