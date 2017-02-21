@extends('layouts.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Papeis </h2>
        </div>
        @endsection 
        <div class="pull-right">
            @permission('role-create')
            <a class="btn btn-primary" href="{{ route('roles.create') }}"><span class="glyphicon glyphicon-plus"></span> Cadastrar papel</a>
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
    <table class="table table-bordered table-hover dataTable">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Visualizar</a>
                @permission('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                @endpermission
                @permission('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endpermission
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {!! $roles->render() !!}
        @endsection