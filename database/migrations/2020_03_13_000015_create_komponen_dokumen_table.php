<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomponenDokumenTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'komponen_dokumen';

    /**
     * Run the migrations.
     * @table komponen_dokumen
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_komponen_dokumen');
            $table->string('file_dokumen')->nullable();
            $table->string('komentar_dokumen')->nullable();
            $table->unsignedInteger('siswa_id');
            $table->unsignedInteger('dokumen_id');

            $table->index(["dokumen_id"], 'fk_komponen_dokumen_dokumen1_idx');

            $table->index("siswa_id");

            $table->foreign('siswa_id')
                ->references('id_siswa')->on('siswa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('dokumen_id', 'fk_komponen_dokumen_dokumen1_idx')
                ->references('id_dokumen')->on('dokumen')
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
