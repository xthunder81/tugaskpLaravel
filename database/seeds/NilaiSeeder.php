<?php

use Illuminate\Database\Seeder;
use App\Nilai;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nilai::create([
            'nama_nilai' => 'Bahasa Inggris',
            'status' => 1
        ]);
        Nilai::create([
            'nama_nilai' => 'Bahasa Indonesia',
            'status' => 1
        ]);
        Nilai::create([
            'nama_nilai' => 'Matematika',
            'status' => 1
        ]);
        Nilai::create([
            'nama_nilai' => 'Bahasa Jerman',
            'status' => 0
        ]);
    }
}
