<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusPendaftaranTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'status_pendaftaran';

    /**
     * Run the migrations.
     * @table status_pendaftaran
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_status_pendaftaran');
            $table->string('keterangan')->nullable();
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('pendaftaran_id');

            $table->index(["pendaftaran_id"], 'fk_status_pendaftaran_pendaftaran1_idx');

            $table->index(["status_id"], 'fk_status_pendaftaran_status1_idx');


            $table->foreign('status_id', 'fk_status_pendaftaran_status1_idx')
                ->references('id_status')->on('status')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pendaftaran_id', 'fk_status_pendaftaran_pendaftaran1_idx')
                ->references('id_pendaftaran')->on('pendaftaran')
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
