@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Mostrar Médico</h2>
        </div>
        @endsection    
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('medico.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<div class="row" style="margin-left: 5%;">

    <div class="form-group">
        <strong>Nome:</strong>
        {{ $medico->usuario->name }}
    </div>
    <div class="form-group">
        <strong>CRM:</strong>
        {{ $medico->crm }}
    </div>
    <div class="form-group">
        <strong>Especialidade:</strong>
        {{ $medico->especialidade->nomeespecialidade }}
    </div>   

</div>
@endsection