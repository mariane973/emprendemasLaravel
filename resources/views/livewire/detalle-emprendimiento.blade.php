<div class="container">
    <div class="row">
        
        <div class="col-lg-10">
            <h5 class="fw-semibold" style="color: green;">Información sobre el emprendimiento  <i class="fas fa-search" style="color: green; font-size: 15px"></i></h3></h5>
            <hr class="me-4 " style="color: green;">
            <h4 class="fw-bold mt-5 pt-3 mb-5 text-center">PRODUCTOS</h4>
            @if($productos->isEmpty())
                <div class="alert alert-success text-center mx-5" role="alert">
                    Este emprendimiento no ofrece productos actualmente.
                </div>
            @else
            <div class="row">
            @foreach($productos as $producto)
                <div class="col-lg-6 md-6 mb-5">
                    <div class="d-flex align-items-center justify-content-center position-relative height: 100px;">            
                        @if($producto->descuento > 0)
                        <span class="badge bg-danger position-absolute mt-3 top-0 start-0 rounded-pill" style="margin: 0; margin-left:8px;">
                        {{ $producto->descuento }}% off
                            </span>
                        @endif
                        
                        <img src="/imagenes/productos/{{$producto->imagen}}" class="image-product" alt="">
                    <div class="box mt-1">        
                        <h5 class="fw-bold">{{ $producto->nombre }}</h5>
                        <p class="" style=" margin-bottom: 0;"><span class="fw-semibold" style="font-size: 16px; margin-bottom: 0;">Descripción: </span class="fw-semibold" >{{ $producto->descripcion }}</p>
                        @if($producto->cantidad && $producto->medida)
                            <p><span class="fw-semibold" style="font-size: 16px;"> Contenido: </span class="fw-semibold"> {{ $producto->cantidad }} {{ $producto->medida }}</p>
                        @endif
                        <p style="margin-bottom: 0;">
                            <span class="fw-semibold" style="font-size: 16px; color: black;">Precio:</span>
                            <span style="color: green; font-size: 16px;">${{ number_format($producto->valor_final) }}</span>
                        </p>
                        
                        @if($producto->stock > 0)
                            @can('agregarCarrito')
                                <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $producto->id }})">
                                    <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                                </button>
                            @endcan

                            @if ($producto->stock <= 10)
                                @can('editarProducto')
                                    <p class="text-warning"><strong>¡Quedan {{ $producto->stock }} unidades disponibles!</strong></p>
                                @endcan                    
                            @endif
                        @else
                            <p class="text-danger"><strong>No hay stock disponible.</strong></p>
                        @endif           
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif


            <h4 class="fw-bold mt-5 mb-4 text-center">SERVICIOS</h4>
            @if($servicios->isEmpty())
                <div class="alert alert-success text-center mx-5" role="alert">
                    Este emprendimiento no ofrece servicios actualmente.
                </div>
            @else
            <div class="row">
                @foreach($servicios as $servicio)
                <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center position-relative">
                @if($servicio->descuento > 0)
                <span class="badge bg-danger position-absolute mt-3 top-0 start-0 rounded-pill" style="margin: 0; margin-left:8px;">
                {{ $servicio->descuento }}% off
                    </span>
                @endif
                <img src="/imagenes/servicios/{{$servicio->imagen}}" class="image-product" alt="">
                <div class="box">
                <h5 class="fw-bold">{{ $servicio->nombre }}</h5>
                        <p class="" style=" margin-bottom: 0;"><span class="fw-semibold" style="font-size: 16px; margin-bottom: 0;">Descripción: </span class="fw-semibold" >{{ $servicio->descripcion }}</p>
                        <p style="margin-top: 20px; margin-bottom: 0;">
                        <span class="fw-semibold" style="font-size: 16px; color: black;">Precio:</span>
                        <span style="color: green; font-size: 16px;">${{ number_format($servicio->valor_final) }}</span>
                    </p>
                    @can('agregarCarrito')
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $servicio->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                    @endcan
                    <div class="d-flex gap-2 mt-3">
                        @can('editarProducto')
                        <a href="/servicios/{{$servicio->id}}/edit" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        @endcan
                        @can('eliminarProducto')
                            <button type="button" class="btn btn-danger" wire:click='eliminacion({{$servicio->id}})'>
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
                @endforeach
            </div>
            @endif
        </div>


        <div class="col-lg-2">
            <div class="sticky-top" style="top: 100px;">
            <img src="/imagenes/emprendimientos/{{$vendedor->logo}}" class="image-empren mb-3 mx-4" alt="" style="height: 120px; width: 120px">
                <h4 class="fw-bold mb-4 ms-3 text-center fst-italic">{{ $vendedor->nom_emprendimiento }}</h4>
                <div class="container ">
                <p class="text-start mt-3 mb-3">{{ $vendedor->descrip_emprendimiento }}</p>
                <br>
                <p class="text-start"><b>Teléfono: </b>{{ $vendedor->telefono }}</p>
                <p class="text-start"><b>Correo: </b>{{ $vendedor->user->email }}</p>
                <p class="text-start"><b>Dirección: </b>{{ $vendedor->direccion }}</p>
                <p class="text-start"><b>Ciudad: </b>{{ $vendedor->ciudad }}</p>
                </div>
                
            </div>
        </div>
    </div>
</div>


