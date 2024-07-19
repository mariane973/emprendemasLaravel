<div class="container">
    @include('layouts.mensaje')
    <div class="row mb-5 justify-content-center align-items-center text-center text-xs-start">
        <h5 class="col-lg-4 col-md-6 col-xs-12 me-sm-2 fw-semibold ms-4" style="color: green;">Ofertas - Productos</h5>
        
        <div class="Caja_Busqueda col-lg-4 col-md-9 col-xs-12 justify-content-end p-lg-4 ms-lg-4  ms-sm-2 mt-3 mt-sm-0">
            <input wire:model.live='search' type="text" placeholder="Buscar una oferta">
            <i class="fas fa-search"></i>
        </div>
    </div>

        <div class="row">
        @foreach($ofertaCont as $ofertaVista)
        <div class="col-lg-3 col-sm-6 md-6 mt-3 col-xs-12 d-flex align-items-center justify-content-center">
            <div class="card mb-3" style="max-width: 280px; height: 450px; border-color: transparent;">
                <div class="m-auto ps-2 py-2">
                    <div class="descuento  fst-italic">{{$ofertaVista->descuento}}% off</div>
                    <img src="imagenes/productos/{{$ofertaVista->imagen}}" class="img-fluid rounded-start rounded-end mt-2 me-2" alt="..." style="height: 130px; width: 170px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <center>
                        <h5 class="card-title fw-bold mb-2">{{$ofertaVista->nombre}}</h5>
                    </center>

                    <p style="margin-bottom: 0;">
                        <span class="fw-semibold text-start" style="font-size: 14px; margin-bottom: 0;"></span>{{ $ofertaVista->descripcion }}
                    </p>
                    
                    @if($ofertaVista->cantidad && $ofertaVista->medida)
                    <p>
                        <span class="fw-bold" style="font-size: 14px;">Contenido: </span>{{ $ofertaVista->cantidad }} {{ $ofertaVista->medida }}
                    </p>
                    @endif
                    
                    <div class="row mx-4">
                        <div class="col col-6">
                            <del><p class="card-text mt-1 fw-bold" style="font-size: 15px; color: red;">${{ number_format($ofertaVista->precio, 0) }}</p></del>
                        </div>
                        <div class="col col-6">
                            <p class="card-text-descuento mt-1 fw-bold" style="font-size: 15px; color: green;">${{ number_format($ofertaVista->valor_final, 0) }}</p>
                        </div>
                    </div>

                    <center>
                        @if($ofertaVista->stock > 0)
                            @can('agregarCarrito')
                                <button type="button" class="btn btn-success mb-3" wire:click="agregarCarro({{ $ofertaVista->id }})">
                                    <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                                </button>
                            @endcan

                            @if ($ofertaVista->stock <= 10)
                                @can('editarProducto')
                                    <p class="text-warning"  style="font-size: 0.9rem;"><strong>¡Quedan {{ $ofertaVista->stock }} unidades disponibles! </strong></p>
                                @endcan                    
                            @endif
                        @else
                            <p class="text-danger"><strong>No hay stock disponible.</strong></p>
                        @endif

                        @can('editarProducto')
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/productos/{{$ofertaVista->id}}/edit" class="btn btn-success">
                                <i class="fas fa-edit me-1"></i> Editar
                            </a>
                            <button type="button" class="btn btn-danger" wire:click='eliminacion({{$ofertaVista->id}})'>
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        </div>
                        @endcan
                    </center>
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

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('show-no-results-alert', () => {
            document.querySelector('.alert').style.display = 'block';
        });
    });
</script>