@extends('layouts.navbar')
@section('titulo', 'Crear Servicio')
@section('content')
@can('accesoVendedor')
<h2 class="text-center mb-5 fw-bold">CREAR SERVICIO</h2>
<div class="container d-flex justify-content-center">
<form action="/servicios" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <label class="form-label">Nombre</label>
                <input type="text" placeholder="Ingresa el nombre del servicio" class="form-control" name="nombre" required="">
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Descripción</label>
                <input type="text" placeholder="Describe a detalle el paquete del servicio." class="form-control" name="descripcion" required="">
                <small class="form-text text-muted">Especifica de qué se compone o en qué unidades (ej. 5 sesiones, 10 horas).</small>
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Precio</label>
                <input type="number" placeholder="Ingresa el precio del servicio" class="form-control" name="precio" id="precio" required="">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="vendedor_id" class="form-label fw-semibold">Emprendimiento</label>
                <select class="form-control" name="vendedor_id" required>
                    <option value="" disabled selected>Selecciona tu emprendimiento</option>
                    @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}">{{ $vendedor->nom_emprendimiento }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 mb-4">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" placeholder="" class="form-control" name="imagen" required="">
            </div>
            <div class="contenedor-menu-info">
                <h1 class="mb-4 mt-3 fw-semibold" style="font-size: 18px;font-weight: 350;">¿El servicio tiene oferta?</h1>
                <select id="opcOfertaSelect" class="form-control" name="opcOferta">
                    <option value="no">No</option>
                    <option value="si">Sí</option>
                </select>

                <div id="ofertaFields" style="display: none;">
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label fw-semibold">Indica el descuento (%)</label>
                                <input type="number" placeholder="Porcentaje de descuento" class="form-control" name="descuento" id="descuento">
                                <small class="form-text text-muted">Ingresa valores numéricos sin el signo (%).</small>
                            </div>
                            <div class="col-lg-6 mb-4 fw-semibold">
                                <label class="form-label">Valor Total</label>
                                <input type="number" placeholder="" class="form-control" name="valor_final" id="valor_final" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Crear</button>
    </div>
</form>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection