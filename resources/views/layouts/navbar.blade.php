<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{!! asset('css/principal.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/produempren.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/stylecard.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/usustyle.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/home.css') !!}">
    <link rel="shortcut icon" type="image/png" href="/imagenes/icon-tucan.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <style>
        .tailwind {
            @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
        }
    </style> -->
    @livewireStyles
</head>
<body class="@yield('body-class', 'bg')">
    <nav>   
        <div class="Navbar container-fluid fixed-top" style="background-color: white; ">    
            <div class="row">
            @cannot('verCarrito')
                <div class="Logo col-lg-2 ms-lg-5 col-md-2 col-sm-1  col-xs-1 offset-sm-12 d-flex  me-sm-2 mb-sm-4  col-xs-1 me-xs-2">
                    <a href="/" class="fw-bold">
                        <img src="/imagenes/op2.png" alt="" style="height: 52px; ">
                    </a>
                </div>
                @endcannot


                
                @can('verCarrito')
                <div class="InicioSesion align-items-end justify-content-end  d-flex col-lg-4 mt-2 col-sm-6 col-md-4  mb-4 ">
                <a href="/" class="fw-bold">
                        <img src="/imagenes/op2.png" alt="" style="height: 52px; " class="">
                    </a>
                    <div class="Usuario col ms-1 mb-2 vertical-align: middle;">
                    <livewire:cartcontador />
                    </div>
                </div>

                <div class="InicioSesion col-lg-2 col-md-2 col-sm-3 col-xs-1 offset-md-3 offset-lg-4 align-items-end justify-content-end d-flex mb-sm-4">
                <div class="dropdown" id="userDropdown">
                    <i class="fas fa-seedling icono" style="font-size: 25px; vertical-align: middle;"></i>
                    <a href="/servicios" class="fw-bold">Conocer</a>
                    <div class="dropdown-content">
                        <a href="/servicios">Servicios</a>
                        <a href="/productos">Productos</a>
                    </div>
                </div>
            </div>
                
                @endcan
                            

            @cannot('verCarrito')
            <div class="InicioSesion col-lg-2 col-md-3 col-sm-3 col-xs-1   @cannot('verCarrito') offset-lg-5 offset-sm-4 offset-xs-1 @endcannot align-items-end justify-content-end d-flex mb-sm-4">
                <div class="dropdown" id="userDropdown">
                    <i class="fas fa-seedling icono" style="font-size: 25px; vertical-align: middle;"></i>
                    <a href="/servicios" class="fw-bold">Conocer</a>
                    <div class="dropdown-content">
                        <a href="/servicios">Servicios</a>
                        <a href="/productos">Productos</a>
                    </div>
                </div>
            </div>
            
            @endcannot
                
                <div class="InicioSesion col-lg-2 col-md-3 col-sm-3   col-xs-6  justify-content-start d-flex mb-sm-4 col-md-1">
                    @guest
                        <div class="Usuario " style="display: flex; align-items: center;">
                        <i class="fas fa-user-circle iconos" style="font-size: 30px; vertical-align: middle;"></i>
                            <a href="{{ route('login') }}"  class="fw-bold ms-2">Ingresar</a>
                        </div>
                    @else
                        <div class="Usuario col align-items-end">
                            <div class="dropdown" id="userDropdown">
                            <i class="fas fa-user-circle iconon" style="font-size: 30px; vertical-align: middle;"></i>
                                <span class="fw-bold" id="userName" style="vertical-align: middle;">{{ Auth::user()->name }}</span>
                                <div class="dropdown-content">
                                    <a href="{{ route('profile') }}">Perfil</a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>  
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <hr>
    </div>
    <main class="py-4 " style="margin-top: 5rem;">
        @yield('content')
    </main>

<footer class="bg-body-tertiary text-center mt-5 ">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
        <!-- Facebook -->
        <a
        data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #3b5998;"
            href="#!"
            role="button"
            ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #55acee;"
            href="#!"
            role="button"
            ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #dd4b39;"
            href="#!"
            role="button"
            ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #ac2bac;"
            href="#!"
            role="button"
            ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #0082ca;"
            href="#!"
            role="button"
            ><i class="fab fa-linkedin-in"></i
        ></a>
        <!-- Github -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #333333;"
            href="#!"
            role="button"
            ><i class="fab fa-github"></i
        ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <p class="text-body">&copy; 2024 Company, Inc</p>
    </div>
    <!-- Copyright -->
    </footer>
    <script src="{{ asset('js/oferta.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts

</body>
</html>

<script>
    // Función para mostrar/ocultar las opciones del menú
    function toggleDropdown() {
        var dropdown = document.getElementById("userDropdown");
        dropdown.classList.toggle("show");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Alerta Eliminar -->
<script>
    // Alerta Producto
    window.addEventListener('eliminacion-producto', event => {
        Swal.fire({
        title: "¿Estás seguro de eliminar este producto?",
        text: "No podrás revertir esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar" 
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmacionEliminacion');
            }
        })
    });
    window.addEventListener('productoEliminado', event => {
        Swal.fire({
            title: "Producto Eliminado",
            html: '<img src="imagenes/success.gif">',
            showConfirmButton: false,
            timer: 1500
        });
    });
    // Alerta Servicio
    window.addEventListener('eliminacion-servicio', event => {
        Swal.fire({
        title: "¿Estás seguro de eliminar este servicio?",
        text: "No podrás revertir esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar" 
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmacionEliminacion');
            }
        })
    });
    window.addEventListener('servicioEliminado', event => {
        Swal.fire({
            title: "Servicio Eliminado",
            html: '<img src="imagenes/success.gif">',
            showConfirmButton: false,
            timer: 1500
        });
    });
    // Alerta Emprendimiento
    window.addEventListener('eliminacion-emprendimiento', event => {
        Swal.fire({
        title: "¿Estás seguro de eliminar este emprendimiento?",
        text: "No podrás revertir esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar" 
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmacionEliminacion');
            }
        })
    });
    window.addEventListener('emprendimientoEliminado', event => {
        Swal.fire({
            title: "Emprendimiento Eliminado",
            html: '<img src="imagenes/success.gif">',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>