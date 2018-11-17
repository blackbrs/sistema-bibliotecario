<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    protected $fillable = ['carrera','paginas'];
    public $timestamps = false;
}
