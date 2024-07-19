<div class="container">
    @include('layouts.mensaje')
    <div class="row mb-5 justify-content-center align-items-center text-center text-xs-start">
        <h5 class="col-lg-4 col-md-6 col-xs-12 me-sm-2 fw-semibold ms-4" style="color: green;">Servicios</h5>

        @can('agregarVendedor')
        <div class="Caja_Busqueda col-lg-2 col-md-3 col-xs-12 justify-content-center mt-3 mt-sm-0">
            <a href="/servicios/create" class="btn fw-semibold" style="background-color: #8FDABA; color: white;">
                <i class="fas fa-plus me-1"></i> Crear Servicio
            </a>
        </div>
        @endcan

        <div class="Caja_Busqueda col-lg-4 col-md-9 col-xs-12 justify-content-end p-lg-4 ms-lg-4  ms-sm-2 mt-3 mt-sm-0">
            <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar un servicio">
            <i class="fas fa-search ms-2 ps-sm-4"></i>
        </div>
    </div>

    <div class="row">
        @foreach($servicioCont as $servicioVista)
        <div class="col-lg-6 col-md-6 col-xs-12 mt-5 mb-5">
            <div class="d-flex align-items-center justify-content-center position-relative" style="height: 150px">
                <div class="position-relative">
                    @if($servicioVista->descuento > 0)
                    <span class="badge bg-danger position-absolute discount-badge" style="margin: 0;">
                        {{ $servicioVista->descuento }}% off
                    </span>
                    @endif
                </div>
                <img src="imagenes/servicios/{{$servicioVista->imagen}}" class="image-product" alt="">
                <div class="box mt-3">
                    <h4 class="fw-bold">{{ $servicioVista->nombre }}</h4>
                    <p style="margin-bottom: 0;">
                        <span class="fw-semibold" style="font-size: 16px;">Descripción: </span>{{ $servicioVista->descripcion }}
                    </p>
                    <p style="margin-bottom: 0;">
                        <span class="fw-semibold" style="font-size: 16px; color: black;">Precio:</span>
                        <span style="color: green; font-size: 16px;">${{ number_format($servicioVista->valor_final) }}</span>
                    </p>

                    @can('agregarCarrito')
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $servicioVista->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                    @endcan

                    <div class="d-flex gap-2 mt-3">
                        @can('editarProducto')
                        <a href="/servicios/{{$servicioVista->id}}/edit" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        @endcan
                        @can('eliminarProducto')
                        <button type="button" class="btn btn-danger" wire:click='eliminacion({{$servicioVista->id}})'>
                            <i class="fas fa-trash-alt me-1"></i> Eliminar
                        </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($sinResultados)
    <div class="alert alert-success text-center mb-5" role="alert">
        {{ $sinResultados }}
    </div>
    @endif
</div>

<style>
    .discount-badge {
        top: 0;
        left: 0;
        transform: translate(10%, -400%);
    }
</style>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('show-no-results-alert', () => {
            document.querySelector('.alert').style.display = 'block';
        });
    });
</script>