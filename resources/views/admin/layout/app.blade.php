<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('dashboard/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet"
          href="{{ asset('dashboard/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    @yield('css')
    <title>Paneau de contrôle - ANDEL</title>
</head>

<body>
<div class="dashboard-main-wrapper">
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="{{ url('/admin') }}"><img src="{{ asset('img/logo.png') }}" alt=""
                                                                    style="width:30%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    {{--                    <li class="nav-item">--}}
                    {{--                        <div id="custom-search" class="top-search-bar">--}}
                    {{--                            <input class="form-control" type="text" placeholder="Search..">--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item dropdown notification">--}}
                    {{--                        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>--}}
                    {{--                        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">--}}
                    {{--                            <li>--}}
                    {{--                                <div class="notification-title"> Notification</div>--}}
                    {{--                                <div class="notification-list">--}}
                    {{--                                    <div class="list-group">--}}
                    {{--                                        <a href="#" class="list-group-item list-group-item-action active">--}}
                    {{--                                            <div class="notification-info">--}}
                    {{--                                                <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
                    {{--                                                <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.--}}
                    {{--                                                    <div class="notification-date">2 min ago</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                        <a href="#" class="list-group-item list-group-item-action">--}}
                    {{--                                            <div class="notification-info">--}}
                    {{--                                                <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
                    {{--                                                <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you--}}
                    {{--                                                    <div class="notification-date">2 days ago</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                        <a href="#" class="list-group-item list-group-item-action">--}}
                    {{--                                            <div class="notification-info">--}}
                    {{--                                                <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
                    {{--                                                <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository--}}
                    {{--                                                    <div class="notification-date">2 min ago</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                        <a href="#" class="list-group-item list-group-item-action">--}}
                    {{--                                            <div class="notification-info">--}}
                    {{--                                                <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>--}}
                    {{--                                                <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.--}}
                    {{--                                                    <div class="notification-date">2 min ago</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </li>--}}
                    {{--                            <li>--}}
                    {{--                                <div class="list-footer"> <a href="#">View all notifications</a></div>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img src="https://via.placeholder.com/128x128"
                                                                           alt="" class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                             aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }} </h5>
                                <span class="status"></span><span
                                    class="ml-2">{{ Auth::user()->role->description }}</span>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Compte</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Paramètres</a>
                            <a class="dropdown-item" href="#" onclick="$('#logout-form').submit()"><i
                                    class="fas fa-power-off mr-2"></i>Déconnexion</a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @include('admin.layout.navbar')

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            @if(Session::has('message'))
                <div class="alert alert-info alert-dismissible">
                    <strong>Info : {{ Session::get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <div class="footer fixed-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    Copyright © {{ now()->year }} ANDEl .
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="mailto:fawzi.noual@lotus-medias.com">Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('dashboard/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/js/main-js.js') }}"></script>
@yield('scripts')
</body>

</html>
