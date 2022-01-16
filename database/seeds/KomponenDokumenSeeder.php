<?php

use Illuminate\Database\Seeder;
use App\KomponenDokumen;

class KomponenDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KomponenDokumen::create([
            'file_dokumen' => 'iniadalahpathdokumenlangsungdilinkaja',
            'komentar_dokumen' => 'gambar tidak dapat dilihat, harap scan dengan benar',
            'siswa_id' => 1,
            'dokumen_id' => 1
        ]);
        
        KomponenDokumen::create([
            'file_dokumen' => 'iniadalahpathdokumenlangsungdilinkaja',
            'komentar_dokumen' => '',
            'siswa_id' => 1,
            'dokumen_id' => 2
        ]);   

        KomponenDokumen::create([
            'file_dokumen' => 'iniadalahpathdokumenlangsungdilinkaja',
            'komentar_dokumen' => 'Gambar terlalu kecil',
            'siswa_id' => 1,
            'dokumen_id' => 3
        ]);
    }
}
