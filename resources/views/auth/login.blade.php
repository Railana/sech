@extends('layouts.auth')

@section('htmlheader_title')
Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="lg-box">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}">
                    <img src="{{asset('/img/logosech.png')}}" width="150" height="100" /> 
                </a>
            </div><!-- /.login-logo -->

            @if (count($errors) > 0)
            <div class="alert alert-danger">
               <!-- <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br> -->
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg"> Entre para iniciar sua sessão </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Senha" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember"> Lembrar-me
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                <!-- O código abaixo perite logar através de redes sociais -->
                 

                <a href="{{ url('/password/reset') }}">Esqueceu sua senha?</a><br>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });

        $(function () {  // $(document).ready shorthand
            $('#lg-box').hide().fadeIn(1500);

        });
    </script>
</body>

@endsection
