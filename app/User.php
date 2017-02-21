<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{

    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function professores(){
        return $this->hasMany(Professor::class);
    }
     public function areas(){
        return $this->hasMany(Area::class);
    }
     public function departamentos(){
        return $this->hasMany(Departamento::class);
    }
     public function colegiados(){
        return $this->hasMany(Colegiado::class);
    }
}
