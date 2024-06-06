<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Drugs') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/3a534a140c.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Plugins -->


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    @if (Auth::check())
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand " href=" {{ url('/') }}">
                    <h2>{{ config('app.name', 'Drugs') }}</h2>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                {{--Hamburguesa--}}
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                {{-- Buscador --}}
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Buscar">
                        </div>
                    </form>
                </div>
                {{--Header--}}
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"> {{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached me-2 text-success"></i> Mi perfil </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-2 text-primary"></i> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
    
                                    </form>
                        </div>
                    </li>
                </ul>


            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                                <span class="text-secondary text-small">Administrador</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span class="menu-title">{{__('Inicio')}}</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Personas" aria-expanded="false" aria-controls="Personas">
                            <span class="menu-title">Personas</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="Personas">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('personas.index') }}">{{ __('Personas') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tiposidentificaciones.index') }}">{{ __('Tipos de Identificaciones') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('generos.index') }}">{{ __('Generos') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('estadospersonas.index') }}">{{ __('Estados Personas') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('telefonopersonas.index') }}">{{ __('Telefono de personas') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Droguerias" aria-expanded="false" aria-controls="Droguerias">
                            <span class="menu-title"> Droguerias</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="Droguerias">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tiposdroguerias.index') }}">{{ __('Tipos Droguerias') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('droguerias.index') }}">{{ __('Droguerias') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('drogueriaspersonas.index') }}">{{ __('Droguerias Personas') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Asociados" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Asociados</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="Asociados">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tiposasociados.index') }}">{{ __('Relacion Drogueria') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('asociados.index') }}">{{ __('Asociados') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Paises" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Paises</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="Paises">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('paises.index') }}">{{ __('Paises') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('departamentos.index') }}">{{ __('Departamentos') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('ciudades.index') }}">{{ __('Tipos Ciudades') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('indicativosciudades.index') }}">{{ __('Indicativos Ciudades') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Llamadas" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Llamadas</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="Llamadas">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tipificacionllamadas.index') }}">{{ __('Tipificacion Llamadas') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('inscritos.index') }}">{{ __('Inscritos') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('programas.index') }}">{{ __('Programas') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('tipostelefonos.index') }}">{{ __('Tipos Telefonos') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('estadostipificacions.index') }}">{{ __('Estado Tipificaciones') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('causales.index') }}">{{ __('Causales Tipificacion') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('modalidades.index') }}">{{ __('Modalidades') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('horarios.index') }}">{{ __('Horarios') }}</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('datosadicionales.index') }}">{{ __('Datos Adicionales') }}</a></li>
                                
                                
                            </ul>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Inicio
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="row">


                                    <div class="card-body">
                                        @endif

                                        @yield('content')
                                        
                                        @if (Auth::check())
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
                @extends('/layouts/footer')