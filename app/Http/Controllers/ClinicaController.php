<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClinicaController extends Controller
{
    public function index(Request $request)
    {
        $clinicas = Clinica::orderBy('id','DESC')->paginate(5);
        return view('clinica.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
