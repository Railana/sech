<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Clinica;

class ClinicaController extends Controller
{
    public function index(Request $request)
    {
        $clinicas = Clinica::orderBy('id','DESC')->paginate(5);
        return view('clinica.index',compact('clinicas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('clinica.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Clinica::create($request->all());

        return redirect()->route('clinica.index')
                        ->with('success','Clínica cadastrada com sucesso!');
    }
    
    public function edit($id)
    {
        $clinica = Clinica::find($id);
        return view('clinica.edit',compact('clinica'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Clinica::find($id)->update($request->all());

        return redirect()->route('clinica.index')
                        ->with('success','Clinica atualizada com sucesso!');
    }
    
    public function destroy($id)
    {
        Clinica::find($id)->delete();
        return redirect()->route('clinica.index')
                        ->with('success','Clínica excluída com sucesso!');
    }
    
    public function show($id)
    {
        $clinica = Clinica::find($id);
        return view('clinica.show',compact('clinica'));
    }
}
