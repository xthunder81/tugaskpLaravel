<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pendaftaran';

    /**
     * Run the migrations.
     * @table pendaftaran
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_pendaftaran');
            $table->string('nomor_ujian')->nullable();
            $table->unsignedInteger('biaya_gelombang_id');
            $table->unsignedInteger('siswa_id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->index("siswa_id");

            $table->index("admin_id");

            $table->index(["biaya_gelombang_id"], 'fk_pendaftaran_biaya_gelombang1_idx');


            $table->foreign('biaya_gelombang_id', 'fk_pendaftaran_biaya_gelombang1_idx')
                ->references('id_biaya_gelombang')->on('biaya_gelombang')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('siswa_id')
                ->references('id_siswa')->on('siswa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('admin_id')
                ->references('id_admin')->on('admin')
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
