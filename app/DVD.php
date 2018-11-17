<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    protected $fillable = ['duracion'];
    public $timestamps = false;

    public function fisico()
    {
        return $this->morphOne(Fisico::class, 'fisLink');
    }
}
