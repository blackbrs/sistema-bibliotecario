<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    protected $fillable = ['region', 'fechaCreacion'];
    public $timestamps = false;

    public function fisico()
    {
        return $this->morphOne(Fisico::class, 'linkable');
    }
    public function digital()
    {
        return $this->morphOne(Digital::class, 'linkable');
    }
    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }
}
