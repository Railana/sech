<head>
    <title>Relatório de Usuários</title>
</head>
<h2 align="center">Relatório Geral de Usuários</h2>
</br></br>
<table>
    <thead>
        <tr>
            <th width="220px">Nome</th>
            <th width="220px">Email</th>
            <th width="220px">Papel</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email}}</td>
            @if(!empty($user->roles))
                @foreach($user->roles as $v)
                    <td>{{ $v->display_name }}</td>
                @endforeach
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
