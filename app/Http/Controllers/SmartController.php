<?php

namespace App\Http\Controllers;

use App\Models\cafe;
use Symfony\Component\Console\Input\Input;

class SmartController extends Controller
{
    public function cari()
    {
        $suasana = request('k_suasana');
        $lokasi = request('k_lokasi');
        $pelayanan = request('k_pelayanan');
        $fasilitas = request('k_fasilitas');
        $variasiMenu = request('k_variasi_menu');

        $data = cafe::where('k_suasana','>=',$suasana)
            ->where('k_variasi_menu','>=',$variasiMenu)
            ->where('k_fasilitas','>=',$fasilitas)
            ->where('k_pelayanan','>=',$pelayanan)
            ->where('k_lokasi','>=',$lokasi)
            ->get();

        return $data;
    }
}
