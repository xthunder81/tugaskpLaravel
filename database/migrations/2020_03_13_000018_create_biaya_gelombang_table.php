<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiayaGelombangTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'biaya_gelombang';

    /**
     * Run the migrations.
     * @table biaya_gelombang
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_biaya_gelombang');
            $table->string('biaya', 255)->nullable();
            $table->longText('rincian_biaya_daftar_ulang')->nullable();
            // $table->unsignedInteger('jurusan_id');
            $table->unsignedInteger('gelombang_id');

            $table->index(["gelombang_id"], 'fk_biaya_gelombang_gelombang1_idx');

            // $table->index(["jurusan_id"], 'fk_biaya_gelombang_jurusan1_idx');


            // $table->foreign('jurusan_id', 'fk_biaya_gelombang_jurusan1_idx')
            //     ->references('id_jurusan')->on('jurusan')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');

            $table->foreign('gelombang_id', 'fk_biaya_gelombang_gelombang1_idx')
                ->references('id_gelombang')->on('gelombang')
                ->onDelete('no action')
                ->onUpdate('no action');
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
