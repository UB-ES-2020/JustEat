@extends('layouts.app')

@section('header')
    @include('header')
@endsection

@section('content')
<login>
</login>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Inicia sesión') }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Introduce tu email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 ">
                                <input id="password" type="password" placeholder="Introduce tu contrasenya" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class= "col-md-5 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">
                                        ¿Has olvidado tu contraseña?
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Guardar sesión. ') }} <br>
                                        {{ __('No lo marques si compartes ordenador') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning btn-lg btn-block">
                                    {{ __('Inicia sesión') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                ¿Nuevo en Just Eat?
                                <a class="link" href="{{ route('register') }}">
                                    Crear una cuenta
                                </a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                Al crear la cuenta, aceptas nuestros <br>
                                <a class="link" href="{{ route('home') }}">términos y condiciones</a>. Por favor, lee <br>
                                nuestra <a class="link" href="{{ route('home') }}">política de privacidad</a> y nuestra <br>
                                <a class="link" href="{{ route('home') }}">política de cookies</a>.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
