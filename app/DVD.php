<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $table = 'dvds';
    protected $fillable = ['duracion'];
    public $timestamps = false;

    public function fisico()
    {
        return $this->morphOne(Fisico::class, 'linkable');
    }
    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }
}
