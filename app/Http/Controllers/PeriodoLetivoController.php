<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PeriodoLetivo;

class periodoLetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periodos = PeriodoLetivo::orderBy('id','DESC')->paginate(5);
        return view('periodoLetivo.index', compact('periodos'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodoLetivo.create');
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
            'periodo_periodoLetivo' => 'required',
            'ano_periodoLetivo' => 'required',
            'modalidade_periodoLetivo' => 'required',
            'inicio_periodoLetivo' => 'required',
            'termino_periodoLetivo' => 'required',
        ]);

        PeriodoLetivo::create($request->all());

        return redirect()->route('periodoLetivo.index')
                        ->with('success','Período letivo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periodo = periodoLetivo::find($id);
        return view('periodoLetivo.show',compact('periodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = PeriodoLetivo::find($id);
        return view('periodoLetivo.edit',compact('periodo'));
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
            'periodo_periodoLetivo' => 'required',
            'ano_periodoLetivo' => 'required',
            'modalidade_periodoLetivo' => 'required',
            'inicio_periodoLetivo' => 'required',
            'termino_periodoLetivo' => 'required',
        ]);

        PeriodoLetivo::find($id)->update($request->all());

        return redirect()->route('periodoLetivo.index')
                        ->with('success','PeriodoLetivo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        PeriodoLetivo::find($id)->delete();
        return redirect()->route('periodoLetivo.index')
                        ->with('success','Periodo Letivo apagado com sucesso!');
    }
}