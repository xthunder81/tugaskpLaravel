<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_Biaya extends Model
{
    //
    public $timestamps = false;
    protected $table = 'jenis_biaya';
    protected $primaryKey = 'id_jenis_biaya';
    protected $guarded = [];
}
