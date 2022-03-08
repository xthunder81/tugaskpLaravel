<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'siswa';

    /**
     * Run the migrations.
     * @table siswa
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_siswa');
            $table->string('nisn')->unique();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->string('nomor_telp', 255)->nullable();
            $table->string('nomor_hp', 255)->nullable();
            $table->string('status_tempattinggal', 255)->nullable()->comment('0 - Orang Tua | 1 - Lain lain');
            $table->string('asal_sd', 255)->nullable();
            $table->string('alamat_sekolah', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('transportasi', 255)->nullable()->comment('0 - Diantar Orang Tua (Motor) | 1 - Diantar Orang Tua (Mobil) | 2 - Bersepeda | 3 - Ojek Online | 4 - Lain lain');
            $table->string('tinggi_badan', 255)->nullable();
            $table->string('berat_badan', 255)->nullable();
            $table->string('jarak_kesekolah', 255)->nullable();
            $table->string('waktu_tempuh', 255)->nullable();
            $table->string('anak_ke', 255)->nullable()->comment('0 - 1 | 1 - 2 | 2 - 3 | 3 - 4 | 4 - Lain lain');
            $table->string('jumlah_saudara', 255)->nullable()->comment('0 - 1 | 1 - 2 | 2 - 3 | 3 - 4 | 4 - Lain lain');
            $table->string('kartu_keluarga', 255)->nullable();
            $table->string('nama_ayah', 255)->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('nomor_hp_ayah', 255)->nullable();
            $table->string('pendidikan_ayah', 255)->nullable()->comment('0 - Tidak Sekolah | 1 - Putus SD | 2 - SD Sederajat | 3 - SMP Sederajat | 4 - SMA Sederajat | 5 - D1 | 6 - D2 | 7 -D3 | 8 - D4/S1 | 9 - S2 | 10 - S3');
            $table->string('pekerjaan_ayah', 255)->nullable()->comment('0 - Tidak Bekerja | 1 - Nelayan | 2 - Petani | 3 - Peternak | 4 - PNS/TNI/Polri | 5 - Karyawan Swasta | 6 - Pedagang Kecil | 7 -Pedagang Besar | 8 - Wiraswasta | 9 - Wirausaha | 10 - Buruh | 11 - Pensiunan | 12 - Meninggal Dunia | 13 - Lain Lain');
            $table->string('gaji_ayah', 255)->nullable()->comment('0 - Kurang dari 500k | 1 - 500k sampai 1jt | 2 - 1jt sampai 2jt | 3 - 2jt sampai 5jt | 4 - 5jt sampai 20jt | 5 - lebih dari 20jt | 6 - meninggal dunia');
            $table->string('nama_ibu', 255)->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('nomor_hp_ibu', 255)->nullable();
            $table->string('pendidikan_ibu', 255)->nullable()->comment('0 - Tidak Sekolah | 1 - Putus SD | 2 - SD Sederajat | 3 - SMP Sederajat | 4 - SMA Sederajat | 5 - D1 | 6 - D2 | 7 -D3 | 8 - D4/S1 | 9 - S2 | 10 - S3');
            $table->string('pekerjaan_ibu', 255)->nullable()->comment('0 - Tidak Bekerja | 1 - Nelayan | 2 - Petani | 3 - Peternak | 4 - PNS/TNI/Polri | 5 - Karyawan Swasta | 6 - Pedagang Kecil | 7 -Pedagang Besar | 8 - Wiraswasta | 9 - Wirausaha | 10 - Buruh | 11 - Pensiunan | 12 - Meninggal Dunia | 13 - Lain Lain');
            $table->string('gaji_ibu', 255)->nullable()->comment('0 - Kurang dari 500k | 1 - 500k sampai 1jt | 2 - 1jt sampai 2jt | 3 - 2jt sampai 5jt | 4 - 5jt sampai 20jt | 5 - lebih dari 20jt | 6 - meninggal dunia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
