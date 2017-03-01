<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leito;
use App\Clinica;

class LeitoController extends Controller
{
    public function index(Request $request)
    {
        $leitos = Leito::orderBy('id','DESC')->paginate(5);
        return view('leito.index',compact('leitos'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $clinicas = Clinica::lists('nome', 'id');
        return view('leito.create', compact('clinicas'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'leito' => 'required',
            'observacao' => 'required',
            'idclinica' => 'required'
        ]);

        Leito::create($request->all());

        return redirect()->route('leito.index')
                        ->with('success','Leito cadastrado com sucesso!');
    }
    
    public function edit($id)
    {
        $leito = Leito::find($id);
        return view('leito.edit',compact('leito'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'leito' => 'required',
            'observacao' => 'required',
            'idclinica' => 'required'
        ]);

        Leito::find($id)->update($request->all());

        return redirect()->route('leito.index')
                        ->with('success','Leito atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        Leito::find($id)->delete();
        return redirect()->route('leito.index')
                        ->with('success','Leito excluído com sucesso!');
    }
    
    public function show($id)
    {
        $leito = Leito::find($id);
        return view('leito.show',compact('leito'));
    }
}
