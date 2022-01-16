<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    public $timestamps = false;
    protected $table = 'informasi';
    protected $primaryKey = 'id_informasi';
    protected $guarded = [];
}
