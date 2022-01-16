<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomponenNilaiTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'komponen_nilai';

    /**
     * Run the migrations.
     * @table komponen_nilai
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_komponen_nilai');
            $table->integer('nilai')->nullable();
            $table->unsignedInteger('siswa_id');
            $table->unsignedInteger('nilai_id');

            $table->index(["nilai_id"], 'fk_komponen_nilai_nilai1_idx');

            $table->index("siswa_id");


            $table->foreign('siswa_id')
                ->references('id_siswa')->on('siswa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nilai_id', 'fk_komponen_nilai_nilai1_idx')
                ->references('id_nilai')->on('nilai')
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
