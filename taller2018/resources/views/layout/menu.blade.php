<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="./assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->

            <!-- AQUI PONER EL MENU DEL ADMINISTRADOR -->
            @if (auth::user()->isUserInRole ("OWNER"))
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link" href="{{ url('list') }}">
                        <i class="ni ni-bullet-list-67 text-red"></i> Vehiculos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('zona') }}">
                        <i class="ni ni-circle-08 text-green"></i> Zonas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('parqueos') }}">
                        <i class="ni ni-circle-08 text-blue"></i> Parqueos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               <i class="ni ni-circle-08 text-red"></i> Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

            <!-- AQUI PONER EL MENU DEL USUARIO -->
            @elseif (auth::user()->isUser ())

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('vehiculo') }}">
                        <i class="ni ni-circle-08 text-pink"></i> Registrar Vehiculo
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('usuarios') }}">
                        <i class="ni ni-circle-08 text-grey"></i> Usuarios
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('list') }}">
                        <i class="ni ni-bullet-list-67 text-red"></i> Vehiculos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('zona') }}">
                        <i class="ni ni-circle-08 text-green"></i> Zonas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('parqueos') }}">
                        <i class="ni ni-circle-08 text-blue"></i> Parqueos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               <i class="ni ni-circle-08 text-red"></i> Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

            <!-- AQUI PONER EL MENU DEL OWNER -->
            @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('vehiculo') }}">
                        <i class="ni ni-circle-08 text-pink"></i> Registrar Vehiculo
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('list') }}">
                        <i class="ni ni-bullet-list-67 text-red"></i> Vehiculos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('zona') }}">
                        <i class="ni ni-circle-08 text-green"></i> Zonas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('parqueos') }}">
                        <i class="ni ni-circle-08 text-blue"></i> Parqueos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               <i class="ni ni-circle-08 text-red"></i> Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
            @endif


            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->

            <!-- Navigation -->

        </div>
    </div>
</nav>
