<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    public $timestamps = false;
    protected $table = 'fitur';
    protected $primaryKey = 'id_fitur';
    protected $guarded = [];
}
