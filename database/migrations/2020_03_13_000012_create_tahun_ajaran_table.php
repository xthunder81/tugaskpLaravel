<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahunAjaranTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tahun_ajaran';

    /**
     * Run the migrations.
     * @table tahun_ajaran
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_tahun_ajaran');
            $table->string('nama_tahun_ajaran', 45)->nullable();
            $table->tinyInteger('status')->nullable()->comment('BOOLEAN
1 = on
0 = off

hanya 1 yang harus on lainnya off');
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
