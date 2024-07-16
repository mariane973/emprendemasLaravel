@extends('layouts.navbar')
@section('titulo', 'Usuario')
@section('content')
@can('accesoPerfil')
<div class="container text-center">
    <div class="row">
        <h2 class="my-4">Datos del Usuario</h2>
        <div class="col-12">
            <p><strong>Nombre:</strong> {{$usuario->name}}</p>
            <p><strong>Email:</strong> {{$usuario->email}}</p>
        </div>

        <h2 class="my-4">Opciones</h2>
        <div class="d-flex justify-content-center gap-3">
            <a href="/users/{{$usuario->id}}/edit" class="btn btn-edit mt-3">Editar</a>
            <form action="/users/{{$usuario->id}}/confirmar" method="post" class="mt-3">
                @csrf
                @method('get')
                <button type="submit" class="btn btn-delete">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection