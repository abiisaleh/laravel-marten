<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Cafe;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\File;

class CafeRelationManager extends RelationManager
{
    protected static string $relationship = 'cafe';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required(),
                Select::make('kecamatan')
                    ->native(false)
                    ->options(function () {
                        $data = File::json('kotajayapura.json');
                        foreach ($data as $key => $value) {
                            $options[$key] = $key;
                        }
                        return $options;
                    })
                    ->required(),
                Select::make('kelurahan')
                    ->native(false)
                    ->options(function (Get $get) {
                        $kecamatan = $get('kecamatan');
                        $data = File::json('kotajayapura.json');
                        if (!$kecamatan) {
                            return [];
                        }

                        foreach ($data[$kecamatan] as $item) {
                            $options[$item] = $item;
                        }
                        return $options;
                    })
                    ->required(),
                Textarea::make('alamat')
                    ->rows(5)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('kecamatan'),
                Tables\Columns\TextColumn::make('kelurahan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
