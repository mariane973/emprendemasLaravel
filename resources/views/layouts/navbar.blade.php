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
    @livewireStyles
    <style>
        /* Estilo para la imagen del logo */
        .navbar-brand img {
            height: 52px;
        }

        .navbar-nav {
            margin-left: auto;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

    
    </style>
</head>
<body class="@yield('body-class', 'bg')">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">
        <div class="container-fluid d-flex">
    
            <!-- Imagen del logo (visible en todas las pantallas) -->
            @cannot('verCarrito')
            <a class="navbar-brand d-md-none d-lg-block" href="/">
                <img src="/imagenes/op2.png" alt="Logo">
            </a>
            @endcannot

            @can('verCarrito')
            <a class="navbar-brand d-md-none d-lg-block" href="/">
                <img src="/imagenes/op2.png" alt="Logo">
            </a>
            <div class="Usuario ms-xs-5 ps-xs-5  ms-1 mt-3 mb-2">
                <livewire:cartcontador />
            </div>
            @endcan

            <!-- Botón de hamburguesa para pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del menú -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @can('verCarrito')
                    <li class="nav-item d-md-none d-lg-flex align-items-end">
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle mt-2 me-2" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none !important;">
                                <i class="fas fa-seedling icono" style="font-size: 25px; vertical-align: middle;"></i>
                                <a href="/servicios" class="fw-bold"  style="text-decoration: none !important; font-size: 18px; color: #33B66C;">Conocer</a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="/servicios" class="dropdown-item">Servicios</a></li>
                                <li><a href="/productos" class="dropdown-item">Productos</a></li>
                            </ul>
                        </div>
                    </li>
                    @endcan
                    @cannot('verCarrito')
                    <li class="nav-item d-md-none d-lg-flex align-items-end">
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle mt-2 me-2" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none !important;">
                                <i class="fas fa-seedling icono" style="font-size: 25px; vertical-align: middle;"></i>
                                <a href="/servicios" class="fw-bold"  style="text-decoration: none !important; font-size: 18px; color: #33B66C;">Conocer</a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="/servicios" class="dropdown-item">Servicios</a></li>
                                <li><a href="/productos" class="dropdown-item">Productos</a></li>
                            </ul>
                        </div>
                    </li>
                    @endcannot
                    <li class="nav-item d-md-none d-lg-flex">
                        @guest
                        <div class="Usuario ms-3 mt-2" style="display: flex; align-items: center;"  style="text-decoration: none !important;">
                            <i class="fas fa-user-circle iconos" style="font-size: 30px; vertical-align: middle;"></i>
                            <a href="{{ route('login') }}" class="fw-bold ms-2 me-5 pe-5" style="text-decoration: none !important; font-size: 18px; color: #33B66C;">Ingresar</a>
                        </div>
                        @else
                        <!-- Botón de dropdown para usuario -->
                        <div class="Usuario col align-items-end">
                            <div class="dropdown">
                                <button class="btn btn-link dropdown-toggle me-5 pe-5 mt-2" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none !important;">
                                    <i class="fas fa-user-circle iconon me-1" style="font-size: 30px; vertical-align: middle;"></i>
                                    <span class="fw-bold" id="userName" style="text-decoration: none !important;">{{ Auth::user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Perfil</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <hr>
    </div>
    <main class="py-4" style="margin-top: 5rem;">
        @yield('content')
    </main>

    <footer class="bg-body-tertiary text-center mt-5">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
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