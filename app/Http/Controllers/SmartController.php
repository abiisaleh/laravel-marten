<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class SmartController extends Controller
{
    /**
     * Metode SMART (Simple Multi Attribute Rating Technique)
     *
     * Dataset adalah data alternatif kuantitatif dalam bentuk array.
     * ex. $dataset = [
     *          [25000, 153, 15.3, 250],   #a1
     *          [33000, 177, 12.3, 380],   #a2
     *          [40000, 199, 11.1, 480]    #a3
     * ];
     *
     * Grades digunakan untuk menghitung bobot.
     * ex. $grades = [9, 5, 7, 6];
     *
     * Criterion Type: 'benefit' or 'cost'.
     * ex. $criterion_type = ['cost', 'benefit', 'cost', 'benefit'];
     */
    public function smart(array $alternatif, array $dataset, array $grades, array $criterion_type)
    {
        // normalisasi bobot
        foreach ($grades as $bobot) {
            $w[] = $bobot / array_sum($grades);
        }

        //max & min value
        for ($i = 0; $i < count($grades); $i++) {
            $max[] = max(array_column($dataset, $i));
            $min[] = min(array_column($dataset, $i));
        }

        for ($i = 0; $i < count($dataset); $i++) {
            for ($j = 0; $j < count($dataset[$i]); $j++) {
                //utility
                if ($min[$j] - $max[$j] == 0) {
                    $u = 0;
                } else {
                    if ($criterion_type[$j] == 0) {
                        $u = ($max[$j] - $dataset[$i][$j]) / ($max[$j] - $min[$j]);
                    } else {
                        $u = ($dataset[$i][$j] - $min[$j]) / ($max[$j] - $min[$j]);
                    }
                }

                $utility[$i][] = $u;

                //rangking
                $uw[$i][] = $u * $w[$j];
            }

            $result[$i]['alternatif'] = $alternatif[$i];
            $result[$i]['value'] = array_sum($uw[$i]);
        }

        //urutkan
        usort($result, fn ($a, $b) => $b['value'] <=> $a['value']);

        return [
            $w,
            $result,
            $utility,
            $uw,
        ];
    }


    public function cari(): View
    {

        $suasana = request('k_suasana');
        $lokasi = request('k_lokasi');
        $pelayanan = request('k_pelayanan');
        $fasilitas = request('k_fasilitas');
        $variasiMenu = request('k_variasi_menu');

        $data = cafe::with('menu');

        if ($suasana != '0') $data->where('k_suasana', $suasana);
        if ($variasiMenu != '0') $data->where('k_variasi_menu', $variasiMenu);
        if ($fasilitas != '0') $data->where('k_fasilitas', $fasilitas);
        if ($pelayanan != '0') $data->where('k_pelayanan', $pelayanan);
        if ($lokasi != '0') $data->where('k_lokasi', $lokasi);

        if (is_null($data->first())) {
            return view('pages.rekomendasi404');
        }

        foreach ($data->get() as $alternatif) {
            $nilai = [];
            $nilai['nilai'][] = subkriteria::find($alternatif->k_suasana)->nilai;
            $nilai['nilai'][] = subkriteria::find($alternatif->k_variasi_menu)->nilai;
            $nilai['nilai'][] = subkriteria::find($alternatif->k_fasilitas)->nilai;
            $nilai['nilai'][] = subkriteria::find($alternatif->k_pelayanan)->nilai;
            $nilai['nilai'][] = subkriteria::find($alternatif->k_lokasi)->nilai;
            $nilai['nama'] = $alternatif->nama;
            $dataset[] = $nilai['nilai'];
            $alt[] = $nilai;
        }

        $kriteria = kriteria::all();

        $result = $this->smart(
            $data->pluck('nama')->toArray(),
            $dataset,
            $kriteria->pluck('bobot')->toArray(),
            $kriteria->pluck('utility')->toArray()
        );

        return view('pages.rekomendasi', [
            'cafe' => $data->get(),
            'kriteria' => $kriteria,
            'normalisasi' => $result[0],
            'alternatif' => $alt,
            'utility' => $result[2],
            'uw' => $result[3],
            'result' => $result[1],
        ]);
    }
}
