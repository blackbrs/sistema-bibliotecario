<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digital extends Model
{
    protected $fillable = ['peso','path','formato'];
    public $timestamps = true;

    public function recurso()
    {
        return $this->morphOne(Recurso::class, 'recursoLink');
    }
    public function digLink()
    {
        return $this->morphTo();
    }
}
