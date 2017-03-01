<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leito extends Model
{
    public $fillable = ['leito', 'observacao', 'idclinica'];
}
