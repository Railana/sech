<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $fillable = ['nome', 'fk_departamento', 'fk_coordenador', 'fk_usuario'];

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class, 'fk_departamento');
    }
    
    public function coordenacao() 
    {
        return $this->belongsTo(Coordenacao::class, 'fk_coordenador');
    }

    public function professores()
    {
        return $this->hasMany(Professor::class);
    }
    
    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }
    public function usuario() {
        return $this->belongsTo(User::class, 'fk_usuario');
    }
    
    public static function areas($id){
        return Area::where('fk_departamento', '=', $id)->get();
    }
}
