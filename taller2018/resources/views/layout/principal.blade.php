<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <!-- <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title> -->
    <!-- Favicon -->
    <link href="{{ asset('assets/img/brand/favicon.png') }}." rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">

    <style type="text/css">
        #mymap {
            border:0px;
            width: auto;
            height: 500px;
        }
    </style>

</head>

<body>
<!-- Sidenav Menu lateral-->
@include('layout.menu')
<!-- Main content Contenido principal-->
<div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <img src=" ../../../assets/img/brand/blue.png" width="90" height="70">
            <a class="h3 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('zona')}}"></a>
            <!-- Form -->

            <!-- User -->
             <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="media align-items-center">
                            <span class="avatar avatar rounded-circle">
                              <img alt="Image placeholder" src="../../../assets/img/theme/foto_perfil.jpg" height="50" width="50">
                            </span>

                        </div>
                        <span class="mb-0 text-sm  font-weight-bold">{{ auth::user()->sur_name}} {{auth::user()->last_name}}</span>


                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenido!</h6>
                        </div>
                        <a href="" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Mi Perfil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a action="{{ route('logout') }}" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Salir</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="header bg-gradient-info pb-8 pt-5 pt-md-8" id = "header-morado" style = "height: 0px;">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row">



                </div>
            </div>
        </div>
    </div>

@yield('content')
    </div>

</div>

@yield('styles')

@section('styles')
@if(Auth::user()->id != 1)
<style>
    .hidden { display: none; }
</style>
@endif
@endsection

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.0.0') }}"></script>

</body>

</html>
