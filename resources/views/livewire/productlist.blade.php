<div class="container">
    @include('layouts.mensaje')    
    <div class="row">
    <div class="container mb-5 d-flex justify-content-center align-items-center">
        <h5 class="col-lg-4 col-sm-2 me-sm-2 fw-semibold ms-4" style="color: green;">Productos</h3></h5>
        
            
            @can('agregarVendedor')
                <div class="Caja_Busqueda col-lg-2 justify-content-start ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
                    <a href="/productos/create" class="btn fw-semibold" style="background-color: #8FDABA; color: white;">
                        <i class="fas fa-plus me-1"></i> Crear Producto
                    </a>
                </div>
            @endcan

            @can('agregarCarrito')
                <div class="Caja_Busqueda col-lg-2 col-sm-5 justify-content-start btn dropdown">
                    <select wire:model="categoriaSeleccionada" class=" btn dropdown-toggle fw-semibold" type="button" wire:change="filtrarPorCategoria" style="background-color: #8FDABA; color: white;">
                        <option value="">Todas las categorías</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endcan

            <div class="Caja_Busqueda col-lg-4 justify-content-end p-lg-4 ms-lg-4  ms-sm-2 col-sm-7 col-md-7">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar un producto">
                <i class="fas fa-search ms-2 ps-sm-4"></i>
            </div>
        </div>

        @foreach($productoCont as $productoVista)
        <div class="col-lg-6 col-md-6 mt-5 mb-5">
    <div class="d-flex align-items-center justify-content-center position-relative" style="height: 150px">
        <div class="position-relative ">
        @if($productoVista->descuento > 0)
            <span class="badge bg-danger position-absolute discount-badge" style="margin: 0;">
                {{ $productoVista->descuento }}% off
            </span>
        @endif
        </div>
        <img src="imagenes/productos/{{$productoVista->imagen}}" class="image-product" alt="">
        <div class="box mt-3">        
            <h4 class="fw-bold">{{ $productoVista->nombre }}</h4>
            <p class="" style=" margin-bottom: 0;">
                <span class="fw-semibold" style="font-size: 16px; margin-bottom: 0;"></span>{{ $productoVista->descripcion }}
            </p>
            @if($productoVista->cantidad && $productoVista->medida)
                <p>
                    <span class="fw-semibold" style="font-size: 16px;">Contenido: </span>{{ $productoVista->cantidad }} {{ $productoVista->medida }}
                </p>
            @endif
            <p style="margin-bottom: 0;">
                <span class="fw-semibold" style="font-size: 16px; color: black;">Precio:</span>
                <span style="color: green; font-size: 16px;">${{ number_format($productoVista->valor_final) }}</span>
            </p>
            
            @if($productoVista->stock > 0)
                @can('agregarCarrito')
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $productoVista->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                @endcan

                @if ($productoVista->stock <= 10)
                    @can('editarProducto')
                        <p class="text-warning"><strong>¡Quedan {{ $productoVista->stock }} unidades disponibles!</strong></p>
                    @endcan                    
                @endif
            @else
                <p class="text-danger"><strong>No hay stock disponible.</strong></p>
            @endif

            <div class="d-flex gap-2 mt-3">
                @can('editarProducto')
                    <a href="/productos/{{$productoVista->id}}/edit" class="btn btn-success">
                        <i class="fas fa-edit me-1"></i> Editar
                    </a>
                @endcan
                @can('eliminarProducto')
                    <button type="button" class="btn btn-danger" wire:click='eliminacion({{$productoVista->id}})'>
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
        Livewire.on('productosActualizados', productos => {
            // Actualizar la lista de productos en la vista
            document.querySelector('.alert').style.display = 'block';
        });
    });
</script>


