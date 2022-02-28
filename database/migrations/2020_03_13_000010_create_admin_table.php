<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'admin';

    /**
     * Run the migrations.
     * @table admin
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_admin');
            $table->string('nip')->unique();
            $table->string('nama_admin')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('level')->nullable();
            $table->tinyInteger('status_admin')->nullable()->comment('BOOLEAN
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
