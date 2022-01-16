<?php

use Illuminate\Database\Seeder;
use App\Gelombang;
use Carbon\Carbon;

class GelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gelombang::create([
            'nama_gelombang' => 'Gelombang 1',
            'mulai' => Carbon::parse('2019/12/01'),
            'selesai' => Carbon::parse('2020/01/31'),
            'kuota' => 50,
            'status' => 1,
            'tahun_ajaran_id' => 1
        ]);
        Gelombang::create([
            'nama_gelombang' => 'Gelombang 2',
            'mulai' => Carbon::parse('2020/02/01'),
            'selesai' => Carbon::parse('2020/03/01'),
            'kuota' => 100,
            'status' => 1,
            'tahun_ajaran_id' => 1
        ]);
    }
}
