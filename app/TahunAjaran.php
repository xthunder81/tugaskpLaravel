<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    public $timestamps = false;
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    protected $guarded = [];
}
