<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['nombres','apellidos'];
    public $timestamps = false;
}
