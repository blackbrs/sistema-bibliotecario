<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = ['titulo', 'descripcion','autor','año','thumb','biblioteca_id','versionDigital','categoria','genero', 'principal'];
    private $sansi;//inaccesible ext.
    public function getRes($sansi){

        $this->sansi = $sansi; /*$sansi es el parametro enviado del 
                                controller $Request->get('tipoRecurso')*/
        return $this->recurso; //invoca a la funcion recurso 'hasOne'
    }
     
    protected function recurso(){  //Cualquier tipo de recurso
        return $this->hasOne(app("App\\$this->sansi"));
    }

    public function autor(){
        return $this->belongsTo(Autor::class);
    }

}
