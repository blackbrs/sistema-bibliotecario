<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = ['titulo', 'descripcion','autor_id','año','thumb','biblioteca_id','versionDigital','categoria','genero'];

    public function recursoLink()
    {
        return $this->morphTo();
    }
}
