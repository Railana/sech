<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <br>
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/icon-user.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <br>
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
               <!-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>-->
            </div>
        </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <br><br>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>-->
            <!-- Optionally, you can add icons to the links -->
            <!--<li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>-->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>INÍCIO</span></a></li>
            <?php /*
              <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
              <li class="treeview">
              <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
              <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
              </ul>
              </li>
             */ ?> 


            <!--  Teste-->



            @permission('viewTelaAdministradorDoSistema')

            <li class="treeview">
                <a href="#"><i class="fa fa-cog" data-toggle="dropdown"></i> <span> GERENCIAR </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">          
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-users" aria-hidden="true"></i> USUÁRIOS</a></li>
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i>PAPEIS</a></li>
                    <li><a href="{{ route('periodoLetivo.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i>PERÍODO LETIVO</a></li>
                    <li><a href="{{ route('professor.index') }}"><i class="fa fa-pencil" aria-hidden="true"></i>PROFESSOR</a></li>
                    <li><a href="{{ route('aluno.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>ALUNO</a></li>
                    <li><a href="{{ route('coordenacao.index') }}"><i class="fa fa-sitemap" aria-hidden="true"></i>COORDENAÇÃO</a></li>
                    <li><a href="{{ route('secretario.index') }}"><i class="fa fa-user" aria-hidden="true"></i>SECRETÁRIO</a></li>
                    <li><a href="{{ route('colegiado.index') }}"><i class="fa fa-clipboard" aria-hidden="true"></i>COLEGIADO</a></li>
                    <li><a href="{{ route('area.index') }}"><i class="fa fa-retweet" aria-hidden="true"></i>ÁREA</a></li>
                    <li><a href="{{ route('departamento.index') }}"><i class="fa fa-folder-open" aria-hidden="true"></i>DEPARTAMENTO</a></li>
                    <li><a href="{{ route('disciplina.index') }}"><i class="fa fa-th-list" aria-hidden="true"></i>DISCIPLINA</a></li>
                    <li><a href="{{ route('projeto.index') }}"><i class="fa fa-line-chart" aria-hidden="true"></i>PROJETO</a></li>
                    <li><a href="{{ route('substituicao.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i>SUBSTITUIÇÃO</a></li>
                    <li><a href="{{ route('curso.index') }}"><i class="fa fa-university" aria-hidden="true"></i>CURSO</a></li>
                    <li><a href="#"><i class="fa fa-th" aria-hidden="true" data-toggle="dropdown"></i> <span> ATIVIDADES </span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu"> 
                            <li><a href="{{ route('atividadeComplementar.index') }}">COMPLEMENTAR</a></li>
                            <li><a href="{{ route('atividadePesquisa.index') }}">PESQUISA</a></li>
                            <li><a href="{{ route('atividadeEnsino.index') }}">ENSINO</a></li>
                            <li><a href="{{ route('atividadeAdministrativa.index') }}">ADMINISRATIVA</a></li>
                            <li><a href="{{ route('atividadeAdministrativaAcd.index') }}">ADMIN. ACÂDEMICA</a></li>
                            <li><a href="{{ route('atividadeProjetoExtensao.index') }}">EXTENSÃO</a></li>
                            <li><a href="{{ route('orientacao.index') }}">ORIENTAÇÃO</a></li>
                            <li><a href="{{ route('orientacao_projeto.index') }}">ORIENTAÇÃO DE PROJETO</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class='fa fa-exclamation-circle'></i> <span>SOLICITAÇÕES</span></a></li>
            <li><a href="#"><i class='fa fa-cogs'></i> <span>LOGS</span></a></li>

            @endpermission

            @permission('viewTelaColegiado')
            <li class="treeview">
                <a href="#"><i class='fa fa-link' data-toggle="dropdown"></i> <span> SOLICITAÇÕES </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu"> 
                    <li><a href="{{ route('solicitacao.index') }}">TURMA</a></li>
                </ul>
            </li>
            <li><a href="#"><i class='fa fa-link'></i> <span>ACOMPANHAMENTO</span></a></li>

            @endpermission


            @permission('viewTelaProfessor')
            <li><a href="#"><i class='fa fa-link'></i> <span>PIT</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>RIT</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link' data-toggle="dropdown"></i> <span> ATIVIDADES </span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu"> 
                    <li><a href="{{ route('atividadeEnsino.index') }}">ENSINO</a></li>
                    <li><a href="{{ route('atividadeComplementar.index') }}">COMPLEMENTAR</a></li>
                    <li><a href="{{ route('atividadePesquisa.index') }}">PESQUISA</a></li>
                    <li><a href="{{ route('atividadeProjetoExtensao.index') }}">EXTENÇÃO</a></li>
                    <li><a href="{{ route('atividadeAdministrativa.index') }}">ADMINISTRATIVAS</a></li>
                    <li><a href="{{ route('atividadeAdministrativaAcd.index') }}">de ADMINISTRAÇÃO ACADÊMICA</a></li>
                    <li><a href="{{ route('orientacao.index') }}">ORIENTAÇÃO</a></li>
                    <li><a href="{{ route('orientacao_projeto.index') }}">ORIENTAÇÃO DE PROJETO</a></li>
                    <li><a href="#">SINDICAIS</a></li>
                </ul>
            </li>
            @endpermission

            @permission('viewTelaArea')
            <li><a href="#"><i class='fa fa-link'></i> <span>CADASTRAR</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>PIT</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>RIT</span></a></li>
            <li><a href="{{ route('turma.index') }}"><i class='fa fa-link'></i>ALOCAR TURMAS</a></li>
            <li><a href="{{ route('substituicao.index') }}"><i class='fa fa-link'></i> <span>REGISTRAR SUBSTITUIÇÃO</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>DISTRIBUIR ATIVIDADES</span></a></li>
            @endpermission


            @permission('viewTelaDepartamento')

            <li><a href="#"><i class='fa fa-link'></i><span>PERFIL</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i><span>PIT</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i><span>RIT</span></a></li>
            <li><a href="{{ route('projeto.index') }}"><i class='fa fa-link'></i><span>PROJETO</span></a></li>
            <li><a href="{{ route('curso.index') }}"><i class='fa fa-link'></i><span>CURSO</span></a></li>
            <li><a href="{{ route('professor.index') }}"><i class='fa fa-link'></i><span>PROFESSORES</span></a></li>
            <li><a href="{{ route('disciplina.index') }}"><i class='fa fa-link'></i><span>DISCIPLINA</span></a></li>       
            @endpermission

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
