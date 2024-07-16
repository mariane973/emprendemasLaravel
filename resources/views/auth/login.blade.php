@extends('layouts.app')

@section('content')
<section>
<div class="Login container" style=" height: 500px;">
    <div class="Contenedor row">
        <div class="Logo_Use col-5">
            <div class="Iso_Log col">
            <a href="/" class="fw-bold">
            <img src="imagenes/tucan.png" alt="">
            </a>
                <div class="Text">
                    <h1 class="emprende">EMPRENDE</h1>
                    <h1 class="mas">MAS</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <hr>
        </div>
        <div class="Info col-5">
            <form action="{{ route('login') }}" method="post">
            @csrf
                <div class="Title">
                    <h1>INICIAR SESIÓN</h1>
                </div>
                <div class="In_Use">
                    <input type="text"  class="fw-semibold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="In_Use">
                    <input type="password"  class="fw-semibold @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                    @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="btn-ingresar text-center">
                    <button type="submit" class="fw-bold">Ingresar</button>
                </div>
                @if (Route::has('password.request'))
                <div class="resetpasword"> 
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div>
                @endif
                <div class="Register text-center">
                    <a href="/register">Crear una cuenta</a>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
@endsection
