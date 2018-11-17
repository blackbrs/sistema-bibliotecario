<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = ['titulo', 'descripcion','autor_id','año','thumb','biblioteca_id','versionDigital','categoria','genero'];

    public function fisico()
    {
        return $this->morphOne(\App\Fisico::class, 'recurso');
    }
    public function digital()
    {
        return $this->morphOne(\App\Digital::class, 'recurso');
    }
}
