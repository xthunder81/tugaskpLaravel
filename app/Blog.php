<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = true;
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $guarded = [];
}
