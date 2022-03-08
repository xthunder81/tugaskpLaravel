<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nip' => 12345678,
            'nama_admin' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 1,
            'status_admin' => 1
        ]);

        Admin::create([
            'nip' => 11112222,
            'nama_admin' => 'penerima',
            'password' => bcrypt('admin'),
            'level' => 2,
            'status_admin' => 1
        ]);
    }
}
