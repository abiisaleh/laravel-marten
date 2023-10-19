<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Cafe;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File as FacadesFile;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Daftarkan Cafe';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required(),
                Select::make('kecamatan')
                    ->native(false)
                    ->options(function () {
                        $data = FacadesFile::json('kotajayapura.json');
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
                        $data = FacadesFile::json('kotajayapura.json');
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
                    ->required(),
            ]);
    }

    protected function handleRegistration(array $data): cafe
    {
        $team = cafe::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
