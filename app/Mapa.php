<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    protected $fillable = ['region'];
    public $timestamps = false;

    public function fisico()
    {
        return $this->morphOne(Fisico::class, 'linkable');
    }
    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }
}
