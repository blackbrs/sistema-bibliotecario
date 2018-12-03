<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    protected $table = 'cds';
    protected $fillable = ['nPistas','duracion'];
    public $timestamps = false; 

    public function fisico()
    {
        return $this->morphOne(Fisico::class, 'linkable');
    }
    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }
}
