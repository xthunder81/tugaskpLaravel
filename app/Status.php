<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'status';
    protected $primaryKey = 'id_status';
    protected $guarded = [];
}
