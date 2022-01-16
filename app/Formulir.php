<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    public $timestamps = false;
    protected $table = 'formulir';
    protected $primaryKey = 'id_formulir';
    protected $guarded = [];
}
