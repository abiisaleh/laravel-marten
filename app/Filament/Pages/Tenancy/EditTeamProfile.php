<?php
namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Tenancy\EditTenantProfile;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Database\Eloquent\Model;
 
class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Cafe profile';
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->columns([
                // 'sm' => 1,
                'sm' => 1,
                'md' => 2,
            ])
            ->schema([
                TextInput::make('nama')
                    ->columnSpan(['md' => 2]),
                Select::make('kecamatan')
                    ->native(false)
                    ->options(function() {
                        $data = FacadesFile::json('kotajayapura.json');
                        foreach ($data as $key => $value) {
                            $options[$key] = $key;
                        }
                        return $options;
                    }),
                Select::make('kelurahan')
                    ->native(false)
                    ->options(function(Get $get) {
                        $kecamatan = $get('kecamatan');
                        $data = FacadesFile::json('kotajayapura.json');
                        if (!$kecamatan) {
                            return [];
                        }
                        foreach ($data[$kecamatan] as $item) {
                            $options[$item] = $item;
                        }
                        return $options;
                    }),
                Textarea::make('alamat')    
                    ->rows(10),
                FileUpload::make('gambar')
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('16:9')
            ]);
    }
}