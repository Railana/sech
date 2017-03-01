<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medico;
use App\User;
use App\Especialidade;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medicos = Medico::orderBy('id','DESC')->paginate(15);
        return view('medico.index', compact('medicos'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidade::lists('nomeespecialidade', 'id');
        $usuarios = User::lists('name', 'id');
        return view('medico.create', compact('especialidades','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'idusuario' => 'required',
            'idespecialidade' => 'required',
            'crm' => 'required|max:10:min:4',           
        ]);

        Medico::create($request->all());

        return redirect()->route('medico.index')
                        ->with('success','Médico cadastrado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = medico::find($id);
        return view('medico.show',compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::find($id);
        $especialidades = Especialidade::lists('nomeespecialidade', 'id');
        $usuarios = User::lists('name', 'id');
        return view('medico.edit',compact('medico','especialidades','usuarios' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'idusuario' => 'required',
            'idespecialidade' => 'required',
            'crm' => 'required|max:10:min:4',           
        ]);
        
        Medico::find($id)->update($request->all());
        return redirect()->route('medico.index')
                        ->with('success','Médico atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        Medico::find($id)->delete();
        return redirect()->route('medico.index')
                        ->with('success','Médico removido com sucesso!');
    }
}