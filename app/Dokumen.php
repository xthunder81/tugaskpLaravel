<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    public $timestamps = false;
    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $guarded = [];
}
