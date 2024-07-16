@extends('layouts.navbar')
@section('titulo', 'Editar Emprendimiento')
@section('content')
@can('accesoVendedor')
<h2 class="text-center mt-2 mb-5 fw-bold">EDITAR EMPRENDIMIENTO</h2>
<div class="container d-flex justify-content-center">
<form action="/emprendimientos/{{$vendedorEditar->id}}" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    @method('put')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <label class="form-label fw-semibold">Nombre</label>
                <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->nom_emprendimiento}}" name="nom_emprendimientoEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label fw-semibold">Dirección</label>
                <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->direccion}}" name="direccionEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label fw-semibold">Ciudad</label>
                <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->ciudad}}" name="ciudadEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label fw-semibold">Descripción</label>
                <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->descrip_emprendimiento}}" name="descrip_emprendimientoEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label fw-semibold">Teléfono</label>
                <input type="number" placeholder="" class="form-control" value="{{$vendedorEditar->telefono}}" name="telefonoEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="logo" class="form-label fw-semibold">Logo</label>
                <input type="file" placeholder="" class="form-control" value="{{$vendedorEditar->logo}}" name="logoEdit">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success my-4 fw-semibold">Guardar Cambios</button>
            </div>
        </div>
    </div>
</form>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection