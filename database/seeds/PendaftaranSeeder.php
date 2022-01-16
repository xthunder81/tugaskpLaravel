<?php

use Illuminate\Database\Seeder;
use App\Pendaftaran;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pendaftaran::create([
            'nomor_ujian' => 'A10',
            'biaya_gelombang_id' => 1,
            'siswa_id' => 1,
            'admin_id' => 1
        ]);
    }
}
