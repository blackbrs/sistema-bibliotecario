<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fisico extends Model
{
    protected $fillable = ['copias','unidadesDisponibles','prestamosRealizados'];
    public $timestamps = true;

    public function linkable()
    {
        return $this->morphTo();
    }
}
