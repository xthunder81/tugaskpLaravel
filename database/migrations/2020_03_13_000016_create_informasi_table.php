<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformasiTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informasi';

    /**
     * Run the migrations.
     * @table informasi
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_informasi');
            $table->string('teks_informasi', 45)->nullable();
            $table->unsignedInteger('tahun_ajaran_id');

            $table->index(["tahun_ajaran_id"], 'fk_informasi_tahun_ajaran1_idx');


            $table->foreign('tahun_ajaran_id', 'fk_informasi_tahun_ajaran1_idx')
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
