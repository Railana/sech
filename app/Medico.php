<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    public $fillable = ['idusuario', 'idespecialidade', 'crm', 'assinatura'];
    
    public function usuario() {
        return $this->belongsTo(User::class, 'idusuario');
    }

    public function especialidade() {
        return $this->belongsTo(Especialidade::class, 'idespecialidade');
    }
    
}
