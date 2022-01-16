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
            'nama_dokumen' => 'ijazah',
            'status' => 0
        ]);

        Dokumen::create([
            'nama_dokumen' => 'SKHUN',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'SKL',
            'status' => 1
        ]);

        Dokumen::create([
            'nama_dokumen' => 'Sertifikat Les Bahasa Inggris',
            'status' => 1
        ]);
    }
}
