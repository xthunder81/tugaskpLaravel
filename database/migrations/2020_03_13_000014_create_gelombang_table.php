<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGelombangTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'gelombang';

    /**
     * Run the migrations.
     * @table gelombang
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_gelombang');
            $table->unsignedInteger('daftar_gelombang_id');
            $table->unsignedInteger('tahun_ajaran_id');
            $table->timestamp('mulai')->nullable();
            $table->timestamp('selesai')->nullable();
            $table->unsignedInteger('kuota')->nullable();
            $table->unsignedInteger('kuota_max')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->index(["daftar_gelombang_id"], 'fk_gelombang_daftar_gelombang_idx');
            $table->index(["tahun_ajaran_id"], 'fk_gelombang_tahun_ajaran1_idx');

            $table->foreign('daftar_gelombang_id', 'fk_gelombang_daftar_gelombang_idx')
                ->references('id_daftar_gelombang')->on('daftar_gelombang')
                ->onDelete('no action')->onUpdate('no action');

            $table->foreign('tahun_ajaran_id', 'fk_gelombang_tahun_ajaran1_idx')
                ->references('id_tahun_ajaran')->on('tahun_ajaran')
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
