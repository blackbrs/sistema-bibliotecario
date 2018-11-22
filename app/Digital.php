<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digital extends Model
{
    protected $fillable = ['peso','path','formato'];
    public $timestamps = true;

    public function linkable()
    {
        return $this->morphTo();
    }
}
