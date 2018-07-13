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

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><span class="label label-success label-pill float-right">ADMIN</span><i class="zmdi zmdi-album"></i><span> TEMPLATE </span></a>
                    <ul class="list-unstyled">

                        <li><a href="{{route('template')}}"><span class="label label-pill label-primary float-right">OK</span>Home</a></li>

                        <li><a href="{{route('template',['param'=>'dashboard'])}}"><span class="label label-pill label-primary float-right">OK</span>Dashboard</a></li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>User Interface</span>  <span class="menu-arrow"></span>    </a>
                            <ul>
                                <li><a href="{{route('template',['param'=>'ui-buttons'])}}"><span>Buttons</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-cards'])}}"><span>Cards</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-dropdowns'])}}"><span>Dropdowns</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-checkbox-radio'])}}"><span>Checkboxs-Radios</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-navs'])}}"><span>Navs</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-progress'])}}"><span>Progress</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-modals'])}}"><span>Modals</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-notification'])}}"><span>Notification</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-alerts'])}}"><span>Alerts</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-carousel'])}}"><span>Carousel</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-bootstrap'])}}"><span>Bootstrap UI</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-typography'])}}"><span>Typography</span></a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>Components</span>  <span class="menu-arrow"></span>    </a>
                            <ul>
                                <li><a href="{{route('template',['param'=>'components-grid'])}}"><span>Grid</span></a></li>
                                <li><a href="{{route('template',['param'=>'components-range-sliders'])}}"><span>Range sliders</span></a></li>
                                <li><a href="{{route('template',['param'=>'components-sweet-alert'])}}"><span>Sweet Alerts</span></a></li>
                                <li><a href="{{route('template',['param'=>'components-ratings'])}}"><span>Ratings</span></a></li>
                                <li><a href="{{route('template',['param'=>'components-treeview'])}}"><span>Treeview</span></a></li>
                                <li><a href="{{route('template',['param'=>'components-tour'])}}"><span>Tour</span></a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('template',['param'=>'calendar'])}}">Calendar</a></li>

<!--                         <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>XXXXXXXXXX</span>  <span class="menu-arrow"></span>    </a>
                            <ul>
                                <li><a href="{{route('template',['param'=>'ui-buttons'])}}"><span>xxxxxxx</span></a></li>
                                <li><a href="{{route('template',['param'=>'ui-cards'])}}"><span>xxxxxxx</span></a></li>
                            </ul>
                        </li> -->

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>Tables</span>  <span class="menu-arrow"></span>    </a>
                            <ul>
                                <li><a href="{{route('template',['param'=>'tables-datatable'])}}"><span class="label label-pill label-primary float-right">OK</span><span>Data Table</span></a></li>
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
