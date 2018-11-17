<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable =['duracion','bitrate','calidad'];
    public $timestamps = false;

    public function digital()
    {
        return $this->morphOne(Digital::class, 'digLink');
    }
}
