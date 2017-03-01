<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dentista;
use App\User;
use App\Especialidade;

class DentistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dentistas = Dentista::orderBy('id','DESC')->paginate(15);
        return view('dentista.index', compact('dentistas'))
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
        return view('dentista.create', compact('especialidades','usuarios'));
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
            'cro' => 'required|max:10:min:4',           
        ]);

        Dentista::create($request->all());

        return redirect()->route('dentista.index')
                        ->with('success','Dentista cadastrado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dentista = dentista::find($id);
        return view('dentista.show',compact('dentista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dentista = Dentista::find($id);
        $especialidades = Especialidade::lists('nomeespecialidade', 'id');
        $usuarios = User::lists('name', 'id');
        return view('dentista.edit',compact('dentista','especialidades','usuarios' ));
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
            'cro' => 'required|max:10:min:4',           
        ]);
        
        Dentista::find($id)->update($request->all());
        return redirect()->route('dentista.index')
                        ->with('success','Dentista atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        Dentista::find($id)->delete();
        return redirect()->route('dentista.index')
                        ->with('success','Dentista removido com sucesso!');
    }
}