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
            $table->string('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->string('nomor_telp', 255)->nullable();
            $table->string('nomor_hp', 255)->nullable();
            $table->string('agama', 255)->nullable();
            $table->string('asal_smp', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('status_keluarga', 255)->nullable()->comment('0 - Anak Kandung | 1 - Anak Angkat | 2 - Yatim | 3 - Piatu | 4 - Yatim Piatu');
            $table->string('kebutuhan_khusus', 255)->nullable();
            $table->string('nama_ayah', 255)->nullable();
            $table->string('pendidikan_ayah', 255)->nullable()->comment('0 - Tidak Sekolah | 1 - Putus SD | 2 - SD Sederajat | 3 - SMP Sederajat | 4 - SMA Sederajat | 5 - D1 | 6 - D2 | 7 -D3 | 8 - D4/S1 | 9 - S2 | 10 - S3');
            $table->string('pekerjaan_ayah', 255)->nullable()->comment('0 - Tidak Bekerja | 1 - Nelayan | 2 - Petani | 3 - Peternak | 4 - PNS/TNI/Polri | 5 - Karyawan Swasta | 6 - Pedagang Kecil | 7 -Pedagang Besar | 8 - Wiraswasta | 9 - Wirausaha | 10 - Buruh | 11 - Pensiunan | 12 - Meninggal Dunia | 13 - Lain Lain');
            $table->string('gaji_ayah', 255)->nullable()->comment('0 - Kurang dari 500k | 1 - 500k sampai 1jt | 2 - 1jt sampai 2jt | 3 - 2jt sampai 5jt | 4 - 5jt sampai 20jt | 5 - lebih dari 20jt | 6 - meninggal dunia');
            $table->string('kebutuhan_khusus_ayah', 255)->nullable();
            $table->string('nama_ibu', 255)->nullable();
            $table->string('pendidikan_ibu', 255)->nullable()->comment('0 - Tidak Sekolah | 1 - Putus SD | 2 - SD Sederajat | 3 - SMP Sederajat | 4 - SMA Sederajat | 5 - D1 | 6 - D2 | 7 -D3 | 8 - D4/S1 | 9 - S2 | 10 - S3');
            $table->string('pekerjaan_ibu', 255)->nullable()->comment('0 - Tidak Bekerja | 1 - Nelayan | 2 - Petani | 3 - Peternak | 4 - PNS/TNI/Polri | 5 - Karyawan Swasta | 6 - Pedagang Kecil | 7 -Pedagang Besar | 8 - Wiraswasta | 9 - Wirausaha | 10 - Buruh | 11 - Pensiunan | 12 - Meninggal Dunia | 13 - Lain Lain');
            $table->string('gaji_ibu', 255)->nullable()->comment('0 - Kurang dari 500k | 1 - 500k sampai 1jt | 2 - 1jt sampai 2jt | 3 - 2jt sampai 5jt | 4 - 5jt sampai 20jt | 5 - lebih dari 20jt | 6 - meninggal dunia');
            $table->string('kebutuhan_khusus_ibu', 255)->nullable();
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
