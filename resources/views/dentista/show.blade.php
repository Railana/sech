@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Mostrar Dentista</h2>
        </div>
        @endsection    
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dentista.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<div class="row" style="margin-left: 5%;">

    <div class="form-group">
        <strong>Nome:</strong>
        {{ $dentista->usuario->name }}
    </div>
    <div class="form-group">
        <strong>CRO:</strong>
        {{ $dentista->cro }}
    </div>
    <div class="form-group">
        <strong>Especialidade:</strong>
        {{ $dentista->especialidade->nomeespecialidade }}
    </div>   

</div>
@endsection