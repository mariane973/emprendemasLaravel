<div class="container">
    <div class="row mb-5 justify-content-center align-items-center text-center text-xs-start">
    <h5 class="col-lg-4 col-md-6 col-xs-12 me-sm-2 fw-semibold ms-4" style="color: green;">Emprendimientos</h5>

        @can('crearProducto')
        <div class="Caja_Busqueda col-lg-2 col-md-3 col-xs-12 justify-content-center mt-3 mt-sm-0">
            <a href="/emprendimientos/create" class="btn fw-semibold" style="background-color: #8FDABA; color: white;">
                <i class="fas fa-plus me-1"></i> Crear Emprendimiento
            </a>
        </div>
        @endcan

        <div class="Caja_Busqueda col-lg-4 col-md-9 col-xs-12 justify-content-end p-lg-4 ms-lg-4  ms-sm-2 mt-3 mt-sm-0">
            <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar un emprendimiento">
            <i class="fas fa-search ms-2 ps-sm-4"></i>
        </div>
    </div>
    
    <div class="row">
    @foreach($vendedorCont as $vendedorVista)
    <div class="col-lg-6 md-6 mb-4">
        <div class="d-flex align-items-center justify-content-center">
            <img src="imagenes/emprendimientos/{{$vendedorVista->logo}}" class="image-empren" alt="">
            <div class="box mt-1">
                <h4 class="fw-bold">{{$vendedorVista->nom_emprendimiento}}</h4>
                <p class="" style=" margin-bottom: 0; font-size: 17px">{{$vendedorVista->descrip_emprendimiento}}</p>
                <div class="d-flex gap-2 mt-3">
                    @can('editarProducto')
                    <a href="/emprendimientos/{{$vendedorVista->id}}/edit" class="btn btn-success">
                        <i class="fas fa-edit me-1"></i> Editar
                    </a>
                    @endcan
                    @can('eliminarProducto')
                        <button type="button" class="btn btn-danger" wire:click='eliminacion({{$vendedorVista->id}})'>
                            <i class="fas fa-trash-alt me-1"></i> Eliminar
                        </button>
                    @endcan
                </div>                    
                <a href="{{ route('vendedores.detalle', $vendedorVista->id) }}" class="btn btn-info text-center mt-3 text-white">
                    <i class="fas fa-eye me-1"></i> Ver Detalles
                </a>
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