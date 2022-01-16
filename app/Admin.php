<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{

    use Notifiable;

    public $timestamps = false;
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $guarded = [];
}
