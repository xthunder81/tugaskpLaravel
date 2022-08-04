<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daftarGelombang extends Model
{
    //
    public $timestamps = false;
    protected $table = 'daftar_gelombang';
    protected $primaryKey = 'id_daftar_gelombang';
    protected $guarded = [];
}
