<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    protected $fillable = ['nPistas','duracion'];
    public $timestamps = false; 
}
