<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPendaftaran extends Model
{
    public $timestamps = false;
    protected $table = 'status_pendaftaran';
    protected $primaryKey = 'id_status_pendaftaran';
    protected $guarded = [];
}
