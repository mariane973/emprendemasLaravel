@extends('layouts.navbar')
@section('titulo', 'Editar Servicio')
@section('content')
@can('accesoVendedor')
<h2 class="text-center my-4">EDITAR SERVICIO</h2>
<div class="container d-flex justify-content-center">
<form action="/servicios/{{$serviciosEditar->id}}" method="POST" class="form-editar" enctype="multipart/form-data" class="form-editar">
    @csrf
    @method('put')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <label for="nombreProducto" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="{{$serviciosEditar->nombre}}" name="nombreEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="descripProducto" class="form-label">Descripción</label>
                <input type="text" class="form-control" value="{{$serviciosEditar->descripcion}}" name="descripEdit">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="precioProducto" class="form-label">Precio</label>
                <input type="number" class="form-control" value="{{$serviciosEditar->precio}}" name="precioEdit" id="precio">
            </div>
            <div class="col-lg-6 mb-4">
                <label for="imagen" class="form-label fw-semibold">Imagen</label>
                <input type="file" class="form-control" name="imagen" value="{{$serviciosEditar->imagen}}">
            </div>
            <div class="contenedor-menu-info">
                <h1 class="mb-3 mt-3 fw-semibold" style="font-size: 18px;font-weight: 350;">¿El servico tiene oferta?</h1>
                <select id="opcOfertaSelect" class="form-control" name="opcOferta">
                    <option value="no" {{ $serviciosEditar ->oferta ? 'selected' : '' }}>No</option>
                    <option value="si" {{ $serviciosEditar ->oferta ? 'selected' : '' }}>Sí</option>
                </select>

                <div id="ofertaFields" style="{{ $serviciosEditar -> oferta ? 'display: block;' : 'display: none;' }}">
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label fw-semibold">Indique el descuento (%)</label>
                                <input type="number" placeholder="" class="form-control" name="descuento" id="descuento" value="{{$serviciosEditar ->descuento}}">
                            </div>
                            <div class="col-lg-6 mb-3 fw-semibold">
                                <label class="form-label">Valor Total</label>
                                <input type="number" placeholder="" class="form-control" name="valor_final" id="valor_final" value="{{$serviciosEditar ->valor_final}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Editar</button>
    </div>
</form>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection