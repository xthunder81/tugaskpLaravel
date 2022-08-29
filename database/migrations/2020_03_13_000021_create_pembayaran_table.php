<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pembayaran';

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
            $table->increments('id_pembayaran');
            $table->unsignedInteger('pendaftaran_id');
            $table->string('bukti_pembayaran')->nullable();
            $table->unsignedInteger('jumlah')->nullable();
            $table->unsignedInteger('list_pembayaran_id')->comment('0 - Formulir | 1 - Daftar Ulang');
            $table->tinyInteger('metode_pembayaran')->nullable()->comment('null - Belum Ditentukan | 0 - Cash | 1 - Transfer');
            $table->tinyInteger('status_pembayaran')->nullable()->comment('null - Moderated |1 - DiTerima |2- Tidak Diterima ');
            $table->unsignedInteger('admin_id')->nullable();
            $table->timestamps();

            $table->index('pendaftaran_id');
            $table->index(["admin_id"], 'fk_pembayaran_pendaftaran_idx');

            $table->foreign('pendaftaran_id')
                ->references('id_pendaftaran')->on('pendaftaran')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('admin_id', 'fk_pembayaran_pendaftaran_idx')
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
