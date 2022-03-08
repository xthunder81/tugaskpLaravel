<?php

use Illuminate\Database\Seeder;
use App\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Siswa::create([
        //     'nisn' => 1234567890,
        //     'email' => 'siswa@siswa.siswa',
        //     'password' => bcrypt('1234567890'),
        //     'nama' => 'Nama Siswa',
        //     'tempat_lahir' => 'Surabaya',
        //     'tanggal_lahir' => Carbon::parse('2001/01/01'),
        //     'jenis_kelamin' =>  'L',
        //     'nomor_telp' => '',
        //     'nomor_hp' => '08637827482',
        //     'agama' => 'Islam',
        //     'asal_smp' => 'SMP TEKNOLOGI ADHI TAMA SURABAYA',
        // ]);

        // Siswa::create([
        //     'nisn' => 1111111,
        //     'email' => 'alf@siswa.siswa',
        //     'password' => bcrypt('12345678'),
        //     'nama' => 'Alf',
        //     'tempat_lahir' => 'Surabaya',
        //     'tanggal_lahir' => Carbon::parse('1999/01/01'),
        //     'jenis_kelamin' =>  'P',
        //     'nomor_telp' => '',
        //     'nomor_hp' => '08637827482',
        //     'agama' => 'Islam',
        //     'asal_smp' => 'SMP TEKNOLOGI ADHI TAMA SURABAYA',
        // ]);

        // Siswa::create([
        //     'nisn' => 1111111111,
        //     'email' => 'siswa1@siswa.siswa',
        //     'password' => bcrypt('1111111111'),
        //     'nama' => null,
        //     'tempat_lahir' => null,
        //     'tanggal_lahir' => null,
        //     'jenis_kelamin' =>  null,
        //     'nomor_telp' => null,
        //     'nomor_hp' => null,
        //     'agama' => null,
        //     'asal_smp' => null,
        // ]);

        for($i=1; $i<10; $i++){
            $angka = '';
            for($j=1; $j<=10; $j++){
                $angka = $angka . $i;
            }
            Siswa::create( [
                'nisn'=> $angka,
                'email'=>$angka.'@'.$angka.'.'.$angka,
                'password'=> bcrypt($angka),
                'nama'=> $angka,
                'alamat_domisili'=> $angka,
                'tempat_lahir'=> $angka,
                'tanggal_lahir'=>'2020-05-02',
                'jenis_kelamin'=>'P',
                'nomor_telp'=>$angka,
                'nomor_hp'=>$angka,
                'status_tempattinggal'=>$angka,
                'asal_sd'=> $angka,
                'foto'=>'3333333333_foto.jpg',
                'transportasi'=>'0',
                'nama_ayah'=>$angka,
                'pendidikan_ayah'=>'1',
                'pekerjaan_ayah'=>'9',
                'gaji_ayah'=>'1',
                'nama_ibu'=> $angka,
                'pendidikan_ibu'=>'1',
                'pekerjaan_ibu'=>'10',
                'gaji_ibu'=>'2',
                ] );
        }
    }
}
