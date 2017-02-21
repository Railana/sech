<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\User;

/**
 * Description of RelatorioController
 *
 * @author Lucas
 */
class RelatorioController extends Controller {
    
    
    public function relatorioUsuario(){
        
        $usuarios = User::all();
        //dd($usuarios);
        $pdf = \PDF::loadView('relatorios.usuarios', ['usuarios' => $usuarios]);
        return $pdf->stream();
        
    }
}
