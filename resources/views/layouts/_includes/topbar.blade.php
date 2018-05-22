<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{route('admin.dashboard')}}" class="logo" id="logo-tour">
            <i class="zmdi zmdi-group-work icon-c-logo"></i>
            <span>Empresa</span></a>
    </div>


    <nav class="navbar navbar-custom">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
            
        </ul>

        <ul class="nav navbar-nav pull-right">

            <li class="nav-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user"
                   data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/images/users/avatar-1.jpg')}} " alt="user" class="img-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown "
                     aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">
                            <small>{{Auth::user()->name}}</small>
                        </h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>

                </div>
            </li>

        </ul>

    </nav>

</div>
<!-- Top Bar End -->