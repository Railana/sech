<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoLetivo extends Model
{
    public $fillable = ['periodo_periodoLetivo', 'ano_periodoLetivo', 'modalidade_periodoLetivo',
     'inicio_periodoLetivo','termino_periodoLetivo'];
    
    public function projeto() {
        return $this->hasOne(Professor::class);
    }

     public function atividade_administrativa(){
        return $this->hasMany(Atividade_administrativa::class);
    }
     public function atividade_administrativa_acd(){
        return $this->hasMany(atividade_administrativa_acd::class);
    }
     public function atividade_complementar(){
        return $this->hasMany(Atividade_complementar::class);
    }
     public function atividade_ensino(){
        return $this->hasMany(Atividade_ensino::class);
    }

     public function atividade_pesquisa(){
        return $this->hasMany(Atividade_pesquisa::class);
    }
     public function atividade_projeto_extensao(){
        return $this->hasMany(Atividade_projeto_extensao::class);
    }

    public function solicitacao()
    {
        return $this->hasMany(Solicitacao::class);
    }
}


