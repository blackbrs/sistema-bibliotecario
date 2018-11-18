<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['editorial','volumen','ISBN','paginas'];
    public $timestamps = false;

    public function fisico(){
        return $this->morphOne(Fisico::class, 'fisLink');
    }

    public function digital(){
        return $this->morphOne(Digital::class, 'digLink');
    }
}
