<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $fillable = ['nombreBiblioteca', 'direccion', 'telefono', 'nombreEncargado'];
    public $timestamps = false;
}
