<?php

use Illuminate\Database\Seeder;
use App\KomponenNilai;

class KomponenNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KomponenNilai::create([
            'nilai' => 90,
            'siswa_id' => 1,
            'nilai_id' => 1
        ]);
        KomponenNilai::create([
            'nilai' => 60,
            'siswa_id' => 1,
            'nilai_id' => 2
        ]);
        KomponenNilai::create([
            'nilai' => 80,
            'siswa_id' => 1,
            'nilai_id' => 3
        ]);
    }
}
