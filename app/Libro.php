<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Libro extends Model
{
    protected $fillable = ['recurso_id','editorial_id','volumen','ISBN','paginas'];
    public $timestamps = false;
    public function fisico(){
        return $this->morphOne(Fisico::class, 'linkable');
    }

    public function digital(){
        return $this->morphOne(Digital::class, 'linkable');
    }
    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }
    public function editorial(){
        return $this->belongsTo(Editorial::class);
    }
}
