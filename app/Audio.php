<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $fillable = ['duracion'];
    public $timestamps = false;

    public function digital()
    {
        return $this->morphOne(Digital::class, 'digLink');
    }
}
