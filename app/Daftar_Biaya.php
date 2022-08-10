<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_Biaya extends Model
{
    //
    public $timestamps = false;
    protected $table = 'list_pembayaran';
    protected $primaryKey = 'id_list_pembayaran';
    protected $guarded = [];
}
