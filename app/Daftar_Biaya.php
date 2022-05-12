<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_Biaya extends Model
{
    //
    public $timestamps = false;
    protected $table = 'daftar_biaya';
    protected $primaryKey = 'id_daftar_biaya';
    protected $guarded = [];
}
