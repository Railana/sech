@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Períodos letivos</h2>
        </div>
        @endsection 
        <div class="pull-right">
            @permission('gestao_periodo_letivo-create')
            <a class="btn btn-primary" href="{{ route('periodoLetivo.create') }}"><span class="glyphicon glyphicon-plus"></span> Cadastrar período letivo</a>
            @endpermission
        </div>
    </div>
</div>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<br>
<div class="box">
    <table id="table" class="table table-bordered table-hover dataTable" role="grid">
        <tr>
            <th>No</th>
            <th>Período</th>
            <th>Ano</th>
            <th>Modalidade</th>
            <th>Início</th>
            <th>Término</th>
            <th width="280px">Ação</th>
        </tr>

        @foreach ($periodos as $key => $periodo)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $periodo->periodo_periodoLetivo }}</td>
            <td>{{ $periodo->ano_periodoLetivo }}</td>
            <td>{{ $periodo->modalidade_periodoLetivo }}</td>
            <td>{{ $periodo->inicio_periodoLetivo }}</td>
            <td>{{ $periodo->termino_periodoLetivo }}</td>
            <td>
                @permission('gestao_periodo_letivo-create')
                <a class="btn btn-info" href="{{ route('periodoLetivo.show',$periodo->id) }}">Visualizar</a>
                @endpermission
                @permission('gestao_periodo_letivo-edit')
                <a class="btn btn-primary" href="{{ route('periodoLetivo.edit',$periodo->id) }}">Editar</a>
                @endpermission
                @permission('gestao_periodo_letivo-delete')
                <a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir</a>
                @endpermission
            </td>
        </tr>
        @endforeach
    </table>
</div>
{!! $periodos->render() !!}
@endsection

@if(!empty($periodo))
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Excluir</h4>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                {!! Form::open(['method' => 'DELETE','route' => ['periodoLetivo.destroy', $periodo->id],'style'=>'display:inline']) !!}
                {!! Form::submit('OK', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endif



