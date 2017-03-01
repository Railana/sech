@extends('layouts.app')


@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Médicos</h2>
        </div>
        @endsection 
        <div class="pull-right">
            @permission('gestao_medico-create')
            <a class="btn btn-primary" href="{{ route('medico.create') }}"><span class="glyphicon glyphicon-plus"></span> Cadastrar médico</a>
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
            <th>CRM</th>
            <th>Especialidade</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($medicos as $key => $medico)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $medico->usuario->name }}</td>
            <td>{{ $medico->crm }}</td>
            <td>{{ $medico->especialidade->nomeespecialidade }}</td> 
            <td>
                @permission('gestao_medico-create')
                <a class="btn btn-info" href="{{ route('medico.show',$medico->id) }}">Visualizar</a>
                @endpermission
                @permission('gestao_medico-edit')
                <a class="btn btn-primary" href="{{ route('medico.edit',$medico->id) }}">Editar</a>
                @endpermission
                @permission('gestao_medico-delete')
                <a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir</a>

                @endpermission
            </td>
        </tr>
        @endforeach
    </table>
</div>
{!! $medicos->render() !!}
@endsection


@if(!empty($medico))
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
                {!! Form::open(['method' => 'DELETE','route' => ['medico.destroy', $medico->id],'style'=>'display:inline']) !!}
                {!! Form::submit('OK', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endif