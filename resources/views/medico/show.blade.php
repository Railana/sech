@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Mostrar Professor</h2>
        </div>
        @endsection    
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('professor.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<div class="row">

    <div class="form-group">
        <strong>Nome do Professor:</strong>
        {{ $professor->nome_professor }}
    </div>
    <div class="form-group">
        <strong>Matrícula do professor:</strong>
        {{ $professor->matricula_professor }}
    </div>
    <div class="form-group">
        <strong>Situação do professor:</strong>
        {{ $professor->situacao_professor }}
    </div>
    <div class="form-group">
        <strong>Regime de trabalho do professor:</strong>
        {{ $professor->regime_trabalho_professor }}
    </div>
    <div class="form-group">
        <strong>Carga Horária do professor:</strong>
        {{ $professor->ch_professor }}
    </div>
    <div class="form-group">
        <strong>Início do contrado do professor:</strong>
        {{ $professor->inicio_contrato_professor }}
    </div>
    <div class="form-group">
        <strong>Término do contrado do professor:</strong>
        {{ $professor->termino_contrato_professor }}
    </div>
    <div class="form-group">
        <strong>Número do contrado do professor:</strong>
        {{ $professor->contrato_professor }}
    </div>
    <div class="form-group">
        <strong>Classe do professor:</strong>
        {{ $professor->classe_professor }}
    </div>
    <div class="form-group">
        <strong>Titulação do professor:</strong>
        {{ $professor->titulo_professor }}
    </div>
    <div class="form-group">
        <strong>Email do professor:</strong>
        {{ $professor->email_professor }}
    </div>
    <div class="form-group">
        <strong>Telefone do professor:</strong>
        {{ $professor->telefone_professor }}
    </div>
    <div class="form-group">
        <strong>Endereço do professor:</strong>
        {{ $professor->endereco_professor }}
    </div>

    <div class="form-group">
        <strong>Nome do usuário do usuário:</strong>
        {{ $professor->usuario->name }}
    </div>
    <div class="form-group">
        <strong>Departamento em que está lotado:</strong>
        {{ $professor->departamento->nome }}
    </div>
    <div class="form-group">
        <strong>Área do conhecimento:</strong>
        {{ $professor->area->nome }}
    </div>


</div>
@endsection