<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriCicil extends Model
{
    public $timestamps = false;
    protected $table = 'kategori_cicil';
    protected $primaryKey = 'id_kategori_cicil';
    protected $guarded = [];
}
