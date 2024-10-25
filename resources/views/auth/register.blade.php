@extends('layouts.header')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper" style="background: #f2edf3;">
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    <div class="brand-logo">
                        <h1>{{ __('Drugs') }}</h1>
                    </div>
                    <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}" required autocomplete="name" autofocusplaceholder="Nombre" placeholder="Nombre">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" id="password" placeholder="Password">
                        </div>
                        <div class="mt-3">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">{{ __('Registrate') }}</button>
                        </div>
                    </form>
                    <div class="text-center mt-4 font-weight-light"> Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-primary">Iniciar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection