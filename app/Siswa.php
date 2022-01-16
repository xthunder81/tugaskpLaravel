<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticable
{
    use Notifiable;
    protected $guard = 'siswa';
    
    public $timestamps = false;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $guarded = [];
}
