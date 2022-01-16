<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    public $timestamps = false;
    protected $table = 'gelombang';
    protected $primaryKey = 'id_gelombang';
    protected $guarded = [];
}
