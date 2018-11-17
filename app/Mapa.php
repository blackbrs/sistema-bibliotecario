<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    protected $fillable = ['region'];
    public $timestamps = false;
}
