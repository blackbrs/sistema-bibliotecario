<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['editorial','volumen','ISBN','paginas'];
    public $timestamps = false;
}
