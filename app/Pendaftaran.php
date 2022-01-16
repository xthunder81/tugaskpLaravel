<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    public $timestamps = false;
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $guarded = [];
}
