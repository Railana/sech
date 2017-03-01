<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cid10;

class Cid10Controller extends Controller
{
    public function index(Request $request)
    {
        $cids = Cid10::orderBy('id','DESC')->paginate(5);
        return view('clinica.index',compact('cids'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('cid10.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'codigo' => 'required',
            'descricao' => 'required',
        ]);

        Cid10::create($request->all());

        return redirect()->route('cid10.index')
                        ->with('success','Cid10 cadastrado com sucesso!');
    }
    
    public function edit($id)
    {
        $cid = Cid10::find($id);
        return view('cid.edit',compact('cid'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'codigo' => 'required',
            'descricao' => 'required',
        ]);

        Cid10::find($id)->update($request->all());

        return redirect()->route('cid10.index')
                        ->with('success','Cid10 atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        Cid10::find($id)->delete();
        return redirect()->route('cid10.index')
                        ->with('success','Cid10 excluído com sucesso!');
    }
    
    public function show($id)
    {
        $cid = Cid10::find($id);
        return view('cid10.show',compact('cid'));
    }
}
