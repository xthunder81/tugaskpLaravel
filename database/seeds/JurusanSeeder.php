<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan1 = new Jurusan();
        $jurusan1->nama_jurusan = "Multimedia";
        $jurusan1->save();

        $jurusan2 = new Jurusan();
        $jurusan2->nama_jurusan = "Pemasaran";
        $jurusan2->save();
    }
}
