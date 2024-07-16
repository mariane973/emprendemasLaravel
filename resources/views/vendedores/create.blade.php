@extends('layouts.navbar')
@section('titulo', 'Crear Emprendimiento')
@section('content')
@can('accesoVendedor')
<h3 class="text-center mb-5 fw-bold">CREA TU EMPRENDIMIENTO</h3>
<div class="container d-flex justify-content-center">
<form action="/emprendimientos" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    <div class="mb-3">
        <div class="row mb-3">
            <div class="col col-lg-6">
                <label class="form-label fw-semibold">Nombre</label>
                <input type="text" placeholder="Ingresa el nombre de tu negocio" class="form-control" name="nom_emprendimiento" required="">
            </div>
            <div class="col col-lg-6 mb-3 fw-semibold">
                <label class="form-label">Descripción</label>
                <input type="text" placeholder="¿Sobre qué es tu negocio?" class="form-control" name="descrip_emprendimiento" required="">
            </div>
        </div>
        </div>
    <div class="row">
    <div class="col-lg-6 mb-3">
        <label class="form-label">Teléfono</label>
        <input type="number" placeholder="Ej. 3043565984" class="form-control" name="telefono" required="">
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label">Dirección</label>
        <input type="text" placeholder="Ingresa la direccion de tu negocio" class="form-control" name="direccion" required="">
    </div>
    </div>
    
    <div class="row">
    <div class="col-lg-6 mb-3">
        <label class="form-label fw-semibold">Ciudad</label>
        <input type="text" placeholder="¿En qué ciudad estás?" class="form-control" name="ciudad" required="">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="logo" class="form-label fw-semibold">Logo</label>
        <input type="file" placeholder="" class="form-control" name="logo" required="">
    </div>
    </div>
    
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <div class="text-center">
        <button type="submit" class="btn btn-success my-4 fw-semibold">Crear Emprendimiento</button>
    </div>
</form>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection