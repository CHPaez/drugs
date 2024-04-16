<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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

                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
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
                        @else
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
