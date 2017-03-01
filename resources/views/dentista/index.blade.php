@extends('layouts.app')


@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Dentistas</h2>
        </div>
        @endsection 
        <div class="pull-right">
            @permission('gestao_dentista-create')
            <a class="btn btn-primary" href="{{ route('dentista.create') }}"><span class="glyphicon glyphicon-plus"></span> Cadastrar dentista</a>
            @endpermission
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<br>
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<br>
<div class="box">
    <table class="table table-bordered table-hover dataTable">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>CRO</th>
            <th>Especialidade</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($dentistas as $key => $dentista)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $dentista->usuario->name }}</td>
            <td>{{ $dentista->crm }}</td>
            <td>{{ $dentista->especialidade->nomeespecialidade }}</td> 
            <td>
                @permission('gestao_dentista-create')
                <a class="btn btn-info" href="{{ route('dentista.show',$dentista->id) }}">Visualizar</a>
                @endpermission
                @permission('gestao_dentista-edit')
                <a class="btn btn-primary" href="{{ route('dentista.edit',$dentista->id) }}">Editar</a>
                @endpermission
                @permission('gestao_dentista-delete')
                <a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir</a>

                @endpermission
            </td>
        </tr>
        @endforeach
    </table>
</div>
{!! $dentistas->render() !!}
@endsection


@if(!empty($dentista))
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
                {!! Form::open(['method' => 'DELETE','route' => ['dentista.destroy', $dentista->id],'style'=>'display:inline']) !!}
                {!! Form::submit('OK', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endif