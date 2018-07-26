<header>
    <div class="color-panel hidden-sm">
        <div class="color-mode-icons icon-color"></div>
        <div class="color-mode-icons icon-color-close"></div>
        <div class="color-mode">
            <p>THEME COLOR</p>
            <ul class="inline">
                <li class="color-blue current color-default" data-style="blue"></li>
                <li class="color-red" data-style="red"></li>
                <li class="color-green" data-style="green"></li>
                <li class="color-orange" data-style="orange"></li>
            </ul>
            <label>
                <span>Header</span>
                <select class="header-option form-control input-small">
                    <option value="default" selected>Default</option>
                    <option value="fixed">Fixed</option>
                </select>
            </label>
        </div>
    </div>
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN LOGO (you can use logo image instead of text)-->
                <a class="navbar-brand logo-v1" href="{{ route('site.index' )}}">
                    <img src="{{ url('assets/img/logo_blue.png' )}}" id="logoimg" alt="">
                </a>
                <!-- END LOGO -->
            </div>

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                    <li class="active"><a href="{{ route('site.index' )}}">Home</a></li>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Area Medica
                            <i class="icon-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('especialidade.index' )}}">Visualizar Especialidades</a></li>
                            <li><a href="{{ route('tipo_exame.index' )}}">Visualizar Tipo de Exames</a></li>
                            <li><a href="{{ route('medico.index' )}}">Visualizar Medicos</a></li>
                             <li><a href="#tab_diario" data-toggle="tab" id="dia"> Diário </a></li>  
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Utente
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="{{ route('utente.create' )}}">Efectuar Registo</a></li>-->
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Registo
                                </a>
                                <ul class="dropdown-menu" style="margin-top:0px">
                                    <li><a href="{{ route('utente.create' )}}">Novo</a></li>
                                    <li><a href="{{ route('utente.show',7) }}">Visualizar Dados</a></li>
                                </ul>
                            </li>
                            
                             <li class="dropdown-submenu">
                                <a href="#">
                                   Marcar
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('consulta.create')}}">Consulta</a></li>
                                     <li><a href="{{ route('exame.create')}}">Exame</a></li>
                                </ul>
                            </li>
                             <li class="dropdown-submenu">
                                <a href="#">
                                   Visualizar
                                </a>
                                <ul class="dropdown-menu" style="margin-top:75px">
                                   <li><a href="{{ route('utente_consultas',1 )}}">Consulta</a></li>
                                   <li><a href="{{ route('utente_exames',1 )}}">Exame</a></li>
                                   <li><a href="{{ route('consulta.show',8) }}">Consultas Marcadas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Pessoal Clinico
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                             <li class="dropdown-submenu">
                                <a href="#">
                                    Dados Pessoais
                                </a>
                                <ul class="dropdown-menu" style="margin-top:0px">
                                    <li><a href="{{ route('medico.edit',1)}}">Editar</a></li>
                                    <li><a href="{{ route('medico.show',11 )}}">Visualizar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Gerir RCU
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('rcu.create' )}}">Novo</a></li>
                                    <li><a href="{{ route('rcu.index' )}}">Visualizar Todos</a></li>
                                </ul>
                            </li>
                            
                             <li class="dropdown-submenu">
                                <a href="#">
                                    Consulta
                                </a>
                                <ul class="dropdown-menu" style="margin-top:75px">
                                    <li><a href="{{ route('consulta.update', 1)}}">Realizar</a></li>
                                    <li><a href="{{ route('consulta.index',7) }}">Visualizar Todas</a></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Exame
                                </a>
                                <ul class="dropdown-menu" style="margin-top:115px">
                                    <li><a href="{{ route('exame.update',1 )}}">Realizar</a></li>
                                    <li><a href="{{ route('exame.show',7) }}">Visualizar Todos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>                        
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Admistrador
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            
                            <li class="dropdown-submenu">
                                    <a href="#">
                                       Administrador
                                    </a>
                                    <ul class="dropdown-menu"style="margin-top:0px">
                                        <li><a href="{{ route('administrador.create' )}}">Novo</a></li>
                                        <li><a href="{{ route('administrador.index') }}">Ver todos</a></li>
                                        <li><a href="{{ route('administrador.show', 7)}}">Visualizar</a></li>
                                
                                    </ul>
                            </li>
                            
                            
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Utentes
                                </a>
                                <ul class="dropdown-menu" style="margin-top:37px">
                                    <li><a href="{{ route('utente.create' )}}">Novo Registo</a></li>
                                    <li><a href="{{ route('utente.index') }}">Visualizar Todos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">
                                    Pessoal Clinico
                                </a>
                                <ul class="dropdown-menu" style="margin-top:75px">
                                    <li><a href="{{ route('medico.create' )}}">Novo Registo</a></li>
                                    <li><a href="{{ route('medico.index') }}">Visualizar Todos</a></li>
                                </ul>
                            </li>
                            
                            
                            <li class="dropdown-submenu">
                                <a href="#">
                                   Agenda de Trabalho
                                </a>
                                <ul class="dropdown-menu" style="margin-top:115px">
                                    <li><a href="{{ route( 'agenda_trabalho.create' )}}">Nova Agenda</a></li>
                                    <li><a href="{{ route('agenda_trabalho.index') }}">Visualizar Agendas</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                </ul>                         
            </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER -->

</header>

