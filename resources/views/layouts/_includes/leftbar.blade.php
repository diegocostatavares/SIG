<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu ">
    <div class="sidebar-inner slimscrollleft ">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navegação</li>

                <li class="has_sub">
                    <a href="{{route('admin.dashboard')}}" class="waves-effect"><span
                            class="label label-pill label-primary pull-xs-right"></span><i
                            class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-web"></i>
                        <span> Conteúdo </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.conteudo.canais')}}">Canais</a></li>
                        <li><a href="{{route('admin.conteudo.destaques')}}">Destaques</a></li>
                        <li><a href="{{route('admin.conteudo.depoimentos')}}">Depoimentos</a></li>
                        

                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-map"></i>
                        <span> Roteiros </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.roteiros.passeios.listar')}}">Passeios</a></li>
                        <li><a href="{{route('admin.roteiros.apartamentos.listar')}}">Apartamentos</a></li>
                        <li><a href="{{route('admin.roteiros.altatemporada.listar')}}">Alta Temporada</a></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-email"></i>
                        <span> Contatos Recebidos </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.php">Contatos Recebidos</a></li>
                        <li><a href="ui-cards.php">Roteiros Recebidos</a></li>
                    </ul>
                </li>

          
            </ul>
            <ul>
                <li class="text-muted menu-title">Configurações</li>
                
                <li class="has_sub">
                    <a href="{{route('admin.root.usuarios')}}" class="waves-effect"><i class="zmdi zmdi-assignment-account"></i>
                        <span>Usuários </span> <span class="menu-arrow"></span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->