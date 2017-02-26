@extends('layouts.app')
 
@section('main-content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @section('contentheader_title')
            <div class="pull-left">
                <h2>Especialidade</h2>
            </div>
             @endsection
            <div class="pull-right">
                @permission('especialidade-create')
                    <a class="btn btn-success" href="{{ route('especialidade.create') }}"> Cadastrar Especialidade</a>
                @endpermission
            </div>
            <br><br><br>
        </div>
    </div>
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                    <p>{{ $message }}</p>
            </div>
    @endif
    <table class="table table-bordered">
            <tr>
                <th>Nº</th>
                <th>Especialidade</th>
                <th width="280px">Ação</th>
            </tr>       
    @foreach ($especialidades as $key => $especialidade)
    <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $especialidade->nomeespecialidade }}</td>
            <td>
                    <a class="btn btn-info" href="{{ route('especialidade.show',$especialidade->id) }}">Visualizar</a>
                    @permission('especialidade-edit')
                    <a class="btn btn-primary" href="{{ route('especialidade.edit',$especialidade->id) }}">Editar</a>
                    @endpermission
                    @permission('especialidade-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['especialidade.destroy', $especialidade->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
            </td>
    </tr>
    @endforeach
    </table>
    {!! $especialidades->render() !!}
@endsection