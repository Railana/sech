<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $especialidades = Especialidade::orderBy('nomeespecialidade','asc')->paginate(15);
        return view('especialidade.index', compact('especialidades'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidade.create');
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
            'nomeespecialidade' => 'required',
        ]);

        Especialidade::create($request->all());

        return redirect()->route('especialidade.index')
                        ->with('success','Especialidade cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidade = especialidade::find($id);
        return view('especialidade.show',compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidade = Especialidade::find($id);
        return view('especialidade.edit',compact('especialidade'));
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
            'nomeespecialidade' => 'required',
        ]);

        Especialidade::find($id)->update($request->all());

        return redirect()->route('especialidade.index')
                        ->with('success','Especialidade atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Especialidade::find($id)->delete();
        return redirect()->route('especialidade.index')
                        ->with('success','Especialidade apagada com sucesso!');
    }
}