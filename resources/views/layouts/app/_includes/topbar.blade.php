<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{route('home')}}" class="logo">
            <i class="fa fa-home fa-2x icon-c-logo"></i>
            <span>Empresa</span></a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">


            <!--
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="zmdi zmdi-notifications-none noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">

                    <div class="dropdown-item noti-title">
                        <h5><small><span class="label label-danger pull-xs-right">1</span>Notificações</small></h5>
                    </div>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                        <p class="notify-details">Acesso ao Sistema OK.<small class="text-muted">:-)</small></p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                        Ver Todas
                    </a>

                </div>
            </li>

            
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="zmdi zmdi-email noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg" aria-labelledby="Preview">

                    <div class="dropdown-item noti-title bg-success">
                        <h5><small><span class="label label-danger pull-xs-right">1</span>Mensagens</small></h5>
                    </div>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-faded">
                            <img src="{{asset('assets/app/images/users/avatar-2.jpg')}}" alt="img" class="rounded-circle img-fluid">
                        </div>
                        <p class="notify-details">
                            <b>Administrador</b>
                            <span>Seja Bem Vindo</span>
                            <small class="text-muted">;-)</small>
                        </p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                        Ver Todas
                    </a>

                </div>
            </li>
            -->

            <!-- MENU DIREITO -->
            <!--
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
                    <i class="zmdi zmdi-format-subject noti-icon"></i>
                </a>
            </li>
            -->
            <!-- MENU DIREITO -->

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/app/images/users/avatar-0.jpg')}}" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>{{Auth::user()->name}}</small> </h5>
                    </div>

                    <!-- item-->
                    <a href="{{ route('perfil') }}" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-account-circle"></i> <span>Perfil</span>
                    </a>

                    <!--
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-settings"></i> <span>Configurações</span>
                    </a>
                    -->

                    <!-- item-->
                    <a href="{{ route('trocasenha') }}" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-key"></i> <span>Alterar Senha</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item" 
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i> <span>Sair</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>

            <li class="float-left">
                <button id="btn-fullscreen" class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-fullscreen"></i>
                </button>
            </li>

            <!-- PESQUISAR -->
            <!-- 
            <li class="hidden-mobile app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Pesquisar..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
             -->
            <!-- PESQUISAR -->
        </ul>

    </nav>

</div>
<!-- Top Bar End -->
