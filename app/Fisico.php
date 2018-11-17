<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fisico extends Model
{
    protected $fillable = ['copias','unidadesDisponibles','prestamosRealizados'];
    public $timestamps = true;
    protected $hidden = ['recurso_id','recurso_type','created_at'];
    public function recurso()
    {
        return $this->morphTo();
    }
}
