<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subkriteria extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kriteria_id' => 1, 'nilai' => 1, 'nama' => 'Tertutup'],
            ['kriteria_id' => 1, 'nilai' => 2, 'nama' => 'Terbuka'],
            ['kriteria_id' => 2, 'nilai' => 1, 'nama' => 'Sedikit'],
            ['kriteria_id' => 2, 'nilai' => 2, 'nama' => 'Cukup'],
            ['kriteria_id' => 2, 'nilai' => 3, 'nama' => 'Banyak'],
            ['kriteria_id' => 3, 'nilai' => 1, 'nama' => 'Kurang Lengkap'],
            ['kriteria_id' => 3, 'nilai' => 2, 'nama' => 'Lengkap'],
            ['kriteria_id' => 3, 'nilai' => 3, 'nama' => 'Sangat Lengkap'],
            ['kriteria_id' => 4, 'nilai' => 1, 'nama' => 'Kurang Baik'],
            ['kriteria_id' => 4, 'nilai' => 2, 'nama' => 'Baik'],
            ['kriteria_id' => 4, 'nilai' => 3, 'nama' => 'Sangat Baik'],
            ['kriteria_id' => 5, 'nilai' => 1, 'nama' => 'Pinggir Kota'],
            ['kriteria_id' => 5, 'nilai' => 2, 'nama' => 'Tengah Kota'],
            ['kriteria_id' => 5, 'nilai' => 3, 'nama' => 'Pusat Kota'],
        ];

        foreach ($data as $item) {
            DB::table('subkriterias')->insert($item);
        }
    }
}
