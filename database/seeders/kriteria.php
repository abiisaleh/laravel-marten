<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kriteria extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'suasana',       'bobot' => 22,  'utility' => 1],
            ['nama' => 'variasi menu',  'bobot' => 6,   'utility' => 1],
            ['nama' => 'fasilitas',     'bobot' => 11,  'utility' => 1],
            ['nama' => 'pelayanan',     'bobot' => 8,   'utility' => 1],
            ['nama' => 'lokasi',        'bobot' => 7,   'utility' => 1],
        ];

        foreach ($data as $item) {
            DB::table('kriterias')->insert($item);
        }
    }
}
