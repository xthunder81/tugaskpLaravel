<?php

use Illuminate\Database\Seeder;
use App\Dokumen;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokumen::create([
            'nama_dokumen' => 'Akte Kelahiran',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Kartu Keluarga',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Ijasah',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Raport Nilai',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Sertifikat / Prestasi',
            'status' => 1
        ]);
    }
}
