<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomponenNilai extends Model
{
    public $timestamps = false;
    protected $table = 'komponen_nilai';
    protected $primaryKey = 'id_komponen_nilai';
    protected $guarded = [];
}
