@extends('layouts/header')
@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper" style="background: #f2edf3;">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                           <h1>Drugs</h1>
                        </div>
                        <h4>{{ __('Login') }}</h4>
                        <form class="pt-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" autofocusplaceholder="Usuario" placeholder="Usuario">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">{{ __('Iniciar sesion') }}</button>
                            </div>
                        </form>
                        <div class="text-center mt-4 font-weight-light"> No tienes una cuenta? <a href="{{ route('register') }}" class="text-primary">Registrate</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection