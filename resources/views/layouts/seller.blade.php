<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- JQuery -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    @auth
    @if(auth()->user()->isSeller())
    <div id="app">
        
    <body class="nav-md admin">
    <div class="container body admin">
        <div class="main_container">
        <div id="dashboard" class="col-md-3 left_col">
            <div class="left_col scroll-view">
            <div class="navbar nav_title">
                <a href="#" class="site_title">	                
                    <span>Dashboard</span>
                </a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <!-- Home, List, Calendar, Report -->
                    <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('chart') }}">Chart</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Form <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('software.register') }}">Register Software</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-list"></i> List <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="{{ route('history.list') }}">History Software</a></li>
                        <li><a href="{{ route('software.list') }}">Published Software</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-database"></i> Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>

                </div>
                <!-- sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
            <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px; float:right;">
                        <a style="color: white; text-decoration: none; z-index: 999;" href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user admin"></i>Seller
                        </a>
                        <div style="margin: auto; z-index: 999;" class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i>Logout</a>
                        </div>
                    </li>   
                </ul>
            </nav>
            </div>
        </div>
        <!-- /top navigation -->
        
        <main>
            @yield('content')
        </main>

        </div>
    </div>

    </div>
    @yield('scripts')

    <!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    @else
    <script type="text/javascript">
        window.location = "{{ route('login') }}";
    </script>
    @endif
    @endauth
</body>
</html>

