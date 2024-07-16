@extends('layouts.navbar')
@section('titulo', 'Pedidos')
@section('content')
@can('accesoPedidos')
<section>
  <div class="InicioSesion container">
  <div class="row text-center mb-5">
      <div class="d-lg-none col-10 mb-3 mx-3">
        <button class="btn btn-success w-100" type="button" data-bs-toggle="collapse" data-bs-target="#menuOpciones" aria-expanded="false" aria-controls="menuOpciones">
          Menú de opciones <i class="fas fa-arrow-down"></i>
        </button>
      </div>
      
      <!-- Menú desplegable -->
      <div class="collapse d-lg-none col-12" id="menuOpciones">
        <div class="d-flex flex-column align-items-center">
          <div class="Sec_Emp col-lg-2 mb-sm-3 col-sm-4 col-md-12 d-flex align-items-center justify-content-center">
            <i class="fas fa-shirt icono me-1 me-1" style="color: #33B66C; font-size: 18px;"></i>
            <a href="/productos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Productos</a>
          </div>
          <div class="Sec_Zona col-lg-2 mb-sm-3 col-sm-5 col-md-6 me-3 d-flex align-items-center justify-content-center">
            <i class="fas fa-guitar icono me-1" style="font-size: 20px;"></i>
            <a href="/servicios" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Servicios</a>
          </div>
          <div class="Sec_Emp col-lg-2 mb-sm-3 col-sm-6 col-md-6 mb-sm-1 d-flex align-items-center justify-content-center">
            <i class="fas fa-shop icono me-1" style="font-size: 17px;"></i>
            <a href="/emprendimientos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Emprendimientos</a>
          </div>
          <div class="dropdown col-lg-2 mb-sm-3 me-2 d-flex align-items-center justify-content-center" id="userDropdown">
            <i class="fas fa-tag icono me-1"></i>
            <a href="#" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas</a>
            <div class="dropdown-content" style="margin-top: 110px">
              <a href="/ofertas" class="fw-bold" style="color: #33B66C;  font-size: 15px;">Ofertas productos</a>
              <a href="/ofertas_servicios" class="fw-bold" style="color: #33B66C;  font-size: 16px;">Ofertas servicios</a>
            </div>
          </div>
          <div class="Sec_Ofe col-lg-1 col-sm-6 ms-sm-4 mb-sm-3 col-md-6 me-4 d-flex align-items-center justify-content-center">
            <i class="fas fa-scroll icono me-1" style="color: green;"></i>
            <a href="/pedidos_index" class="fw-bold" style="color: green;  font-size: 18px;">Pedidos</a>
          </div>
          @can('agregarVendedor')
          <div class="Sec_Ofe col-lg-2 mb-sm-3 col-sm-6 col-md-6  d-flex align-items-center justify-content-center">
            <i class="fas fa-clipboard icono me-1"></i>
            <a href="/inventario" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Inventario</a>
          </div>
          @endcan
        </div>
      </div>
      <div class="d-none d-lg-flex col-12 justify-content-around">
        <div class="Sec_Emp col-lg-2 mb-sm-3 col-sm-4 col-md-12 d-flex align-items-center justify-content-center">
          <i class="fas fa-shirt icono me-1 me-1" style="color: #33B66C; font-size: 18px;"></i>
          <a href="/productos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Productos</a>
        </div>
        <div class="Sec_Zona col-lg-2 mb-sm-3 col-sm-5 col-md-6 me-3 d-flex align-items-center justify-content-center">
          <i class="fas fa-guitar icono me-1" style="font-size: 20px;"></i>
          <a href="/servicios" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Servicios</a>
        </div>
        <div class="Sec_Emp col-lg-2 mb-sm-3 col-sm-6 col-md-6 mb-sm-1 d-flex align-items-center justify-content-center">
          <i class="fas fa-shop icono me-1" style="font-size: 17px;"></i>
          <a href="/emprendimientos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Emprendimientos</a>
        </div>
        <div class="dropdown col-lg-2 mb-sm-3 me-2 d-flex align-items-center justify-content-center" id="userDropdown">
          <i class="fas fa-tag icono me-1"></i>
          <a href="#" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas</a>
          <div class="dropdown-content" style="margin-top: 110px">
            <a href="/ofertas" class="fw-bold" style="color: #33B66C;  font-size: 15px;">Ofertas productos</a>
            <a href="/ofertas_servicios" class="fw-bold" style="color: #33B66C;  font-size: 16px;">Ofertas servicios</a>
          </div>
        </div>
        <div class="Sec_Ofe col-lg-1 col-sm-6 ms-sm-4 mb-sm-3 col-md-6 me-4 d-flex align-items-center justify-content-center">
          <i class="fas fa-scroll icono me-1" style="color: green;"></i>
          <a href="/pedidos_index" class="fw-bold" style="color: green;  font-size: 18px;">Pedidos</a>
        </div>
        @can('agregarVendedor')
        <div class="Sec_Ofe col-lg-2 mb-sm-3 col-sm-6 col-md-6  d-flex align-items-center justify-content-center">
          <i class="fas fa-clipboard icono me-1"></i>
          <a href="/inventario" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Inventario</a>
        </div>
        @endcan
      </div>
    </div>
  </div>
</section>

<div class="container">
    <h4 class="fw-semibold mb-4" style="color: green;">Revisa tus pedidos <i class="fas fa-pencil icono me-1 mb-1" style="color: green; font-size: 18px"></i></h4>
   
    <div class="row">
        @foreach($pedidos as $pedido)
            @foreach($pedido->detalles as $detalle)
                <div class="col-lg-4 col-md-4 mb-4">
                    <table class="table card p-2 pt-1 pb-2" style="border-color: transparent;">
                        <tr>
                            <th class="text-start pb-4" colspan="3" style="font-size: 18px; color: green; border-bottom: none;">Información del pedido</th>
                        </tr>
                        <tr>
                            <th>Cliente</th>
                            <td>{{ $pedido->nombre_cl }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $pedido->email_cl }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $pedido->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $pedido->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td>{{ $pedido->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td>{{ ucfirst($detalle->tipo) }}</td>
                        </tr>
                        <tr>
                            <th style="border-bottom: none;">Nombre</th>
                            <td style="border-bottom: none;">
                                @if($detalle->tipo == 'producto')
                                    {{ $detalle->producto->nombre }}
                                @else
                                    {{ $detalle->servicio->nombre }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="border-bottom: none;">Cantidad</th>
                            <td style="border-bottom: none;">{{ $detalle->cantidad }}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $detalle->precio }}</td>
                        </tr>
                        <tr>
                            <th>Total compra</th>
                            <td style="color: green;">{{ $pedido->total }}</td>
                        </tr>
                        @can('agregarCarrito')
                        <tr>
                            <th style="border-bottom: none;">Estado</th>
                            <td style="color: blue; border-bottom: none;" class="fw-bold">{{ $detalle->estado }}</td>
                        </tr>
                        @endcan
                        @can('agregarVendedor')
                        <tr>
                            <th>Actualizar Estado</th>
                            <td>
                                <form action="{{ route('pedido.actualizarEstado', $detalle->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <select name="estado" class="form-control">
                                        <option value="Pedido Aceptado" {{ $detalle->estado == 'Pedido Aceptado' ? 'selected' : '' }}>Pedido Aceptado</option>
                                        <option value="Preparando Pedido" {{ $detalle->estado == 'Preparando Pedido' ? 'selected' : '' }}>Preparando Pedido</option>
                                        <option value="Enviado" {{ $detalle->estado == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                        <option value="Entregado" {{ $detalle->estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white mt-2">
                                        <i class="fas fa-sync-alt"></i> Actualizar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endcan
                    </table>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
        Acceso no Autorizado
    </div>
@endcan
@endsection
