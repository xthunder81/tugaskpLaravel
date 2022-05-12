<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarGelombangTable extends Migration
{

    public $tablename='daftar_gelombang';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id_daftar_gelombang');
            $table->string('nama_daftar_gelombang')->nullable();
            $table->tinyInteger('status_daftar_gelombang')->nullable()->comment('BOOLEAN
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
        Schema::dropIfExists($this->$tablename);
    }
}
