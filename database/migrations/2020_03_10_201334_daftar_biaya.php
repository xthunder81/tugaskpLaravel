<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DaftarBiaya extends Migration
{
    public $tableName ='daftar_biaya';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id_daftar_biaya');
            $table->string('nama_daftar_biaya')->nullable();
            $table->tinyInteger('jenis_daftar_biaya')->nullable()->comment('BOOLEAN
            0 = formulir
            1 = daftar ulang');
            $table->tinyInteger('status_daftar_biaya')->nullable()->comment('BOOLEAN
            1 = on
            0 = off');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
