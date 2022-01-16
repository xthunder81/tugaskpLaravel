<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'nama_status' => 'Diterima',
        ]);
        Status::create([
            'nama_status' => 'Tidak Diterima',
        ]);
    }
}
