<div class="container">
    
    @include('layouts.mensaje')
    <div class="row">
        <div class="container mb-5 d-flex justify-content-center align-items-center">
        <h5 class="col-lg-8 col-sm-5 fw-semibold" style="color: green;">Ofertas - Servicios</h3></h5>
        
            <div class="Caja_Busqueda col-lg-4 col-md-4 ps-sm-3 col-sm-7 col-md-4">
            <input wire:model.live='search' type="text" placeholder="Buscar una oferta">
            <i class="fas fa-search"></i>
            </div>
        </div>
    
        @foreach($ofertaCont  as $ofertaVista)
        <div class="col-lg-3 col-sm-6 md-6 mt-3">
            <div class="card mb-3" style="max-width: 280px; height: 430px; border-color: transparent;">
                <div class="m-auto ps-2 py-2">
                    <div class="descuento fst-italic">{{$ofertaVista->descuento}}% off</div>
                        <img src="imagenes/servicios/{{$ofertaVista->imagen}}" class="img-fluid rounded-start rounded-end mt-2 me-2" alt="..." style="height: 130px; width: 170px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <center>
                    <h5 class="card-title fw-bold mb-2">{{$ofertaVista->nombre}}</h5>
                    </center>
                    
                    <p style=" margin-bottom: 0;">
                        <span class="fw-bold text-start " style="font-size: 14px; margin-bottom: 0;">Paquete: </span>{{ $ofertaVista->descripcion }}
                    </p>
                    
                    <div class="row mx-4" >
                        <div class="col col-6">
                            <del><p class="card-text mt-1 fw-bold" style="font-size: 15px; color: red;">${{ number_format($ofertaVista->precio, 0) }}</p></del>
                        </div>
                        <div class="col col-6">
                            <p class="card-text-descuento mt-1 fw-bold" style="font-size: 15px; color: green;">${{ number_format($ofertaVista->valor_final, 0) }}</p>                            </div>
                    </div>

                    <center>
                        @can('agregarCarrito')
                            <button type="button" class="btn btn-success mb-5" wire:click="agregarCarro({{ $ofertaVista->id }})">
                                <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                            </button>
                        @endcan

                    @can('editarProducto')
                    <div class="d-flex justify-content-center gap-2 mb-5">
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