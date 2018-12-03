<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    protected $fillable = [
        'user_id','biblioteca_id','recurso_id',
    ];

    public function biblioteca(){
        return $this->belongsTo(Biblioteca::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }
    
}
