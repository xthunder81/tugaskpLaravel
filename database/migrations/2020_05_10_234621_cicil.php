<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cicil extends Migration
{
    public $tableName = 'cicil';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_cicil');
            $table->unsignedInteger('siswa_id');
            $table->unsignedInteger('kategori_cicil_id');
            $table->integer('nilai_cicil');
            $table->timestamps();

            $table->index(["kategori_cicil_id"], 'fk_kategori_cicil_id1_idx');

            $table->index(["siswa_id"], 'fk_siswa_id1_idx');


            $table->foreign('siswa_id', 'fk_siswa_id1_idx')
                ->references('id_siswa')->on('siswa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('kategori_cicil_id', 'fk_kategori_cicil_id1_idx')
                ->references('id_kategori_cicil')->on('kategori_cicil')
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
        //
    }
}
