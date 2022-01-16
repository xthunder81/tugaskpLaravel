<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomponenDokumen extends Model
{
    public $timestamps = false;
    protected $table = 'komponen_dokumen';
    protected $primaryKey = 'id_komponen_dokumen';
    protected $guarded = [];
}
