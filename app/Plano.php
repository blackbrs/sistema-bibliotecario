<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['dimension'];
    public $timestamps = false;
}
