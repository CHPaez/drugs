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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex flex-wrap">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Drugs') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personas.index') }}">{{ __('Personas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tiposasociados.index') }}">{{ __('Tipos Asociados') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tiposidentificaciones.index') }}">{{ __('Tipos de Identificaciones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('generos.index') }}">{{ __('Generos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('asociados.index') }}">{{ __('Asociados') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('estadospersonas.index') }}">{{ __('Estados Personas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tiposdroguerias.index') }}">{{ __('Tipos Droguerias') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('droguerias.index') }}">{{ __('Droguerias') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drogueriaspersonas.index') }}">{{ __('Droguerias Personas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('paises.index') }}">{{ __('Paises') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('departamentos.index') }}">{{ __('Departamentos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ciudades.index') }}">{{ __('Ciudades') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historialllamadas.index') }}">{{ __('Historial LLamadas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indicativosciudades.index') }}">{{ __('Indicativos Ciudades') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tipostelefonos.index') }}">{{ __('Tipos Telefonos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('telefonopersonas.index') }}">{{ __('Telefonos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tipificacionllamadas.index') }}">{{ __('Tipificacion Llamadas') }}</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
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
                    @endif
                </div>
            </div>
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        @extends('/layouts/footer')