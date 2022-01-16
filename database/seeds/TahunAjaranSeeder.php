<?php

use Illuminate\Database\Seeder;
use App\TahunAjaran;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAjaran::create([
            'nama_tahun_ajaran' => '2020/2021',
            'status' => 1
        ]);
        TahunAjaran::create([
            'nama_tahun_ajaran' => '2021/2022',
            'status' => 0
        ]);
    }
}
