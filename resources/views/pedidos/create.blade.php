@extends('layouts.navbar')
@section('titulo', 'Crear Pedido')
@section('content')
@can('accesoPedidos')
<section>
    <center>
        <h4 class="mb-4 fw-bold">COMPLETA TU INFORMACIÓN</h4>
    </center>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(count($carritoitemsArray) > 0)
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="{{ auth()->user()->name }}" class="form-control" required>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="telefono">Teléfono:</label>
                            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Ej. 3015488445" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ej. Cra 15 #10 - El poblado" required>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" id="ciudad" name="ciudad" placeholder="Ej. Funza - Cundinamarca"  class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" readonly>
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label">Método de Pago:</label>
                        <select class="form-control" name="pago" required>
                            <option value="" disabled selected>Selecciona un método de pago</option>
                            <option value="Paypal">Paypal</option>
                            <option value="Efecty">Efecty</option>
                            <option value="Visa">Visa</option>
                            <option value="PSE">PSE</option>
                        </select>
                    </div>
                    
                    <h5 class="">Información del pedido</h5>
                    <hr>

                    @foreach($carritoitemsArray as $item)
                        @if($item['tipo'] === 'producto')
                        <input type="hidden" name="carritoitemsArray[]" value="{{ json_encode($item) }}">
                            <input type="hidden" name="producto_id[]" value="{{ $item['id'] }}">
                            <input type="hidden" name="cantidad[]" value="{{ $item['cantidad'] }}">
                            <input type="hidden" name="precio_producto[]" value="{{ $item['valor_final'] }}">
                            <input type="hidden" name="id_vendedor[]" value="{{ $item['id_vendedor'] }}">
                            <div class="card p-3 m-2">
                                <div class="row">
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="producto">Nombre del producto:</label>
                                        <h5 class="fw-semibold ms-2"type="text" id="producto" name="producto" value="{{ $item['nombre'] }}" >
                                            {{ $item['nombre'] }}</h5> 
                                    </div>   
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="cantidad_producto">Cantidad:</label>
                                        <h6 class="fw-semibold ms-2"type="text" id="cantidad_producto" name="cantidad_producto" value="{{ $item['cantidad'] }}" >
                                        {{ $item['cantidad'] }} unidad(es)</h6>  
                                    </div>                            
                                </div>

                            <div class="row">
                                <div class="form-group col-lg-6 mb-1">
                                    <label for="valorTotalProducto">Valor del producto:</label>
                                    <h6 class="fw-semibold ms-2"type="text" id="valor_total_producto" name="valor_total_producto" value="{{ $item['valor_final'] }}" >
                                    ${{ number_format($item['valor_final']) }} COP</h6>  
                                </div>
                                <div class="d-flex col-lg-6 p-3">
                                <a href="/carrito" class="btn btn-success">
                                    <i class="fas fa-edit me-1"></i> Editar pedido
                                </a>
                                </div>
                            </div>
                        </div>
                        @elseif($item['tipo'] === 'servicio')                        
                        <input type="hidden" name="carritoitemsArray[]" value="{{ json_encode($item) }}">
                        <input type="hidden" name="servicio_id[]" value="{{ $item['id'] }}">
                        <input type="hidden" name="cantidad[]" value="{{ $item['cantidad'] }}">
                        <input type="hidden" name="precio_servicio[]" value="{{ $item['valor_final'] }}">
                        <input type="hidden" name="id_vendedor[]" value="{{ $item['id_vendedor'] }}">
                            
                        <div class="card p-3 m-2 mt-3 mb-4">
                        <div class="row">
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="servicio">Nombre del servicio:</label>
                                    <h5 class="fw-semibold ms-2"type="text" id="servicio" name="servicio" value="{{ $item['nombre'] }}" >
                                    {{ $item['nombre'] }}</h5> 
                                </div>  
                                
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="cantidad_servicio">Cantidad (No. paquetes):</label>
                                    <h6 class="ms-2 fw-semibold" type="number" id="cantidad_servicio" value="{{ $item['cantidad'] }}" name="cantidad_servicio" >
                                    {{ $item['cantidad'] }} paquete(s)</h6>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="valorTotalServicio">Valor del servicio:</label>
                                    <h6 class="ms-2 fw-semibold" type="number" id="valor_total_servicio" value="{{ $item['valor_final'] }}" name="valor_total_servicio" >
                                    ${{ $item['valor_final'] }} COP</h6>
                                </div>

                                <div class="d-flex col-lg-6 p-3">
                                <a href="/carrito" class="btn btn-success">
                                    <i class="fas fa-edit me-1"></i> Editar pedido
                                </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    
                    <hr>
                    <div class="form-group mb-3">
                        <label for="total fw-semibold" style="font-size: 20px" >Total a pagar:</label>
                        <input type="text" id="total" name="total" style="background-color:transparent; border-color: transparent; color:green; font-size: 20px" value="{{ number_format($total) }}" class="form-control fw-bold" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success fw-bold" >Guardar Pedido</button>
                    </div>

                </form>
                @else
                    <div class="alert alert-warning">No hay productos ni servicios en el carrito.</div>
                @endif
            </div>
        </div>
    </div>
</section>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
        Acceso no Autorizado
    </div>
@endcan
@endsection