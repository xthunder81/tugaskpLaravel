<?php

use Illuminate\Database\Seeder;
use App\BiayaGelombang;

class BiayaGelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BiayaGelombang::create([
            'biaya' => 120000,
            'rincian_biaya_daftar_ulang' => 'Baju 10k, Hasduk 5k',
            'jurusan_id' => 1,
            'gelombang_id' => 1
        ]);

        BiayaGelombang::create([
            'biaya' => 120000,
            'rincian_biaya_daftar_ulang' => 'Baju 5k, Hasduk 5k',
            'jurusan_id' => 1,
            'gelombang_id' => 2
        ]);
    }
}
