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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS v5.2.1 -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
    />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Drugs') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                    <ul class="navbar-nav">
                        <!--Personas-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Personas
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('personas.index') }}">{{ __('Personas') }}</a>
                                <a class="dropdown-item" href="{{ route('tiposidentificaciones.index') }}">{{ __('Tipos de Identificaciones') }}</a>
                                <a class="dropdown-item" href="{{ route('generos.index') }}">{{ __('Generos') }}</a>
                                <a class="dropdown-item" href="{{ route('estadospersonas.index') }}">{{ __('Estados Personas') }}</a>
                            </ul>
                        </li>
                        
                        <!--Asociados-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Asociados
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('tiposasociados.index') }}">{{ __('Tipos Asociados') }}</a>
                                <a class="dropdown-item" href="{{ route('asociados.index') }}">{{ __('Asociados') }}</a>
                            </ul>
                        </li>                        

                        <!--Droguerias-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Droguerias
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('tiposdroguerias.index') }}">{{ __('Tipos Droguerias') }}</a>
                                <a class="dropdown-item" href="{{ route('droguerias.index') }}">{{ __('Droguerias') }}</a>
                                <a class="dropdown-item" href="{{ route('drogueriaspersonas.index') }}">{{ __('Droguerias Personas') }}</a>                
                            </ul>
                        </li>     
                        
                        <!--Paises-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Paises
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('paises.index') }}">{{ __('Paises') }}</a>
                                <a class="dropdown-item" href="{{ route('departamentos.index') }}">{{ __('Departamentos') }}</a>
                                <a class="dropdown-item" href="{{ route('ciudades.index') }}">{{ __('Ciudades') }}</a>
                                <a class="dropdown-item" href="{{ route('indicativosciudades.index') }}">{{ __('Indicativos Ciudades') }}</a>
                            </ul>
                        </li>
                        
                        <!--Llamadas-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Llamadas
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('historialllamadas.index') }}">{{ __('Historial LLamadas') }}</a>
                                <a class="dropdown-item" href="{{ route('tipostelefonos.index') }}">{{ __('Tipos Telefonos') }}</a>
                                <a class="dropdown-item" href="{{ route('tipificacionllamadas.index') }}">{{ __('Tipificacion Llamadas') }}</a>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>        
                    @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        @extends('/layouts/footer')