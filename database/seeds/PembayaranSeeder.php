<?php

use Illuminate\Database\Seeder;
use App\Pembayaran;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembayaran::create([
            'pendaftaran_id' => 1,
            'bukti_pembayaran' => 'inipathuntukfilebuktipembayaran',
            'jenis_pembayaran' => 0,
            'metode_pembayaran' => 0,
            'status_pembayaran' => 1,
            'admin_id' => 1
        ]);

        Pembayaran::create([
            'pendaftaran_id' => 1,
            'bukti_pembayaran' => 'inipathuntukfilebuktipembayaran',
            'jenis_pembayaran' => 1,
            'metode_pembayaran' => 1,
            'status_pembayaran' => 1,
            'admin_id' => 1
        ]);
    }
}
