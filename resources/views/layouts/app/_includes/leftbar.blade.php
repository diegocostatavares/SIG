<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navegação</li>

                <li class="has_sub">
                    <a href="{{route('home')}}" class="waves-effect"><span class="label label-pill label-primary float-right">1</span><i class="zmdi zmdi-view-dashboard"></i><span> HOME </span> </a>
                </li>

                @if (Auth::user()->isRoot())
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><span class="label label-success label-pill float-right"></span><i class="zmdi zmdi-collection-item"></i><span> ROOT </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('root')}}">Home</a></li>
                        <li><a href="{{route('root.config')}}">Configurações</a></li>
                    </ul>
                </li>
                @endif

                @if (Auth::user()->isRootOrAdmin())
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><span class="label label-success label-pill float-right"></span><i class="zmdi zmdi-collection-item"></i><span> ADMIN </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin')}}">Home</a></li>
                        <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
                    </ul>
                </li>
                @endif

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><span class="label label-success label-pill float-right"></span><i class="zmdi zmdi-collection-item"></i><span> OPERACIONAL </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('operacional')}}">Home</a></li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>Conteúdo</span>  <span class="menu-arrow"></span>    </a>
                            <ul>
                                <li><a href="javascript:void(0);"><span>Home</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
