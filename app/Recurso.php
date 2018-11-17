<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = ['titulo', 'descripcion','autor_id','thumb','biblioteca_id','digital','categoria'];

    public function fisico()
    {
        return $this->morphOne(\App\Fisico::class, 'linkable');
    }
    public function digital()
    {
        return $this->morphOne(\App\Digital::class, 'linkable');
    }
}
