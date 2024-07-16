@extends('layouts.navbar')
@section('content')
@can('accesoPerfil')
<h2 class="text-center my-4">EDITAR USUARIO</h2>
<div class="container d-flex justify-content-center">
<form action="/users/{{$usuEditar->id}}" method="POST" class="form-editar">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nombreUser" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="{{$usuEditar->name}}" name="nameEdit">
    </div>
    <div class="mb-3">
        <label for="emailUser" class="form-label">Correo</label>
        <input type="email" class="form-control" value="{{$usuEditar->email}}" name="correoEdit">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-editar my-5">Editar</button>
    </div>
</form>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection