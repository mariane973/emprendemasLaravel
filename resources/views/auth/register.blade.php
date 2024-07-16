@extends('layouts.app')
@section('content')
<section>
<div class="Login1 container" style="margin-top: 75px; margin-bottom: 50px; height: 650px;">
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="Contenedor row">
                <div class="Info col-5">
                    <div class="Title">
                        <h1>CREAR CUENTA</h1>
                    </div>
                    <div class="In_Use">
                        <input type="text" class="fw-semibold @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre Usuario">
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="In_Use">
                        <input type="email" class="fw-semibold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo">
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="In_Use">
                        <input type="password" class="fw-semibold @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="In_Use">
                    <input type="password" class="fw-semibold" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                    </div>
                    <div class="In_Use">
                        <select class="fw-semibold @error('role') is-invalid @enderror" name="role" required>
                            <option value="">Seleccionar rol</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Cliente">Cliente</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> 
                    <div class="btn-ingresar text-center">
                        <button type="submit" class="fw-bold">Registrar</button>
                    </div>
                    <div class="Comentario pb-2">
                        <h1>¿Ya tienes una cuenta?</h1>
                    </div>
                    <div class="Register text-center">
                        <a href="/login">Iniciar Sesion</a>
                    </div>
                </div>
                <div class="col">
                    <hr>
                </div>
                <div class="Logo_Use col-6">
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
            </div>
        </form>
    </div>
</section>
@endsection
