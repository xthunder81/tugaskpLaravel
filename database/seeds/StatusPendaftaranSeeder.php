<?php

use Illuminate\Database\Seeder;
use App\StatusPendaftaran;

class StatusPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPendaftaran::create([
            'keterangan' => 'Diterima Tanpa Syarat',
            'status_id' => 1,
            'pendaftaran_id' => 1
        ]);
    }
}
