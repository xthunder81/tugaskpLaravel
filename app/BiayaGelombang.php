<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiayaGelombang extends Model
{
    public $timestamps = false;
    protected $table = 'biaya_gelombang';
    protected $primaryKey = 'id_biaya_gelombang';
    protected $guarded = [];
}
