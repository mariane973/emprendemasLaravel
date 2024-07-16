@extends('layouts.app')
@section('content')
<section>
<div class="Login container" style="height: 500px;">
    <div class="Contenedor row">
        <div class="Logo_Use col-5">
            <div class="Iso_Log col">
                <a href="/" class="fw-bold">
                    <img src="/imagenes/tucan.png" alt="">
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
            <div class="Title">
                <h1>RESTABLECER CONTRASEÑA</h1>
            </div>

            <div class="In_Use mt-5">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="In_Use mb-5">
                        <input type="email" id="email" class="fw-semibold form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electrónico">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="btn-ingresar text-center">
                        <button type="submit" class="fw-bold">
                            {{ __('Enviar Enlace') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection