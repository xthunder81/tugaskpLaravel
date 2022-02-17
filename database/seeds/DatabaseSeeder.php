<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(StatusSeeder::class);
        $this->call(DokumenSeeder::class);
        // $this->call(JurusanSeeder::class);
        $this->call(NilaiSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(FiturSeeder::class);
        // $this->call(TahunAjaranSeeder::class);
        $this->call(SiswaSeeder::class);
        // $this->call(GelombangSeeder::class);
        // $this->call(KomponenDokumenSeeder::class);
        // $this->call(InformasiSeeder::cl  ass);
        // $this->call(KomponenNilaiSeeder::class);
        // $this->call(BiayaGelombangSeeder::class);
        // $this->call(PendaftaranSeeder::class);
        // $this->call(StatusPendaftaranSeeder::class);
        // $this->call(PembayaranSeeder::class);
    }
}
