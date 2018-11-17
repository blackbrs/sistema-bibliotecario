<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['dimension'];
    public $timestamps = false;

    public function digital()
    {
        return $this->morphOne(Digital::class, 'digLink');
    }
}
