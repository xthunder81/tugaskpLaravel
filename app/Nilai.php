<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public $timestamps = false;
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $guarded = [];
}
