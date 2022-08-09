<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListpembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_pembayaran', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_list_pembayaran');
            $table->string('nama_list_pembayaran',100)->nullable();
            $table->string('rincian_list_pembayaran',255)->nullable();
            $table->tinyInteger('tipe_pembayaran')->comment('0 - formulir | 1 - Daftar Ulang');
            $table->integer('biaya')->nullable();
            $table->tinyInteger('status_list_pembayaran',2)->comment('0 - tidak aktif | 1 - aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listpembayaran');
    }
}
