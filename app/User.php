<?php

namespace App;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'nacimiento', 'sexo', 'Npadres','telefono' ,'email', 'password', 'municipio_id','biblioteca_id' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function biblioteca(){
        return $this->belongsTo(Biblioteca::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }
    public function recursos(){
        return $this->hasMany(prestamo::class);
    }
}
