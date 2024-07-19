@extends('layouts.navbar')
@section('titulo', 'EmprendeMás')
@section('content')
<section>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-overlay"></div>
    <div class="carousel-item active">
      <img src="imagenes/carousel/carousel6.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="imagenes/carousel/carousel0000.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="imagenes/carousel/carousel00.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <div class="carousel-caption">
  <h1 class="display-5 fw-semibold fst-italic d-none d-sm-block">¿Qué es EmprendeMás?</h1>
    <p class="d-none d-sm-block">EmprendeMás brinda un espacio en el que podrás comercializar tus productos de manera segura, proporcionando contacto directo con clientes e impulsando tu emprendimiento o microempresa de manera virtual. </p>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="container" style="margin-top: 90px; ">
        <center>
        <h3 class="fw-bold" style="margin-bottom: 30px;">CATEGORÍAS</h3>
        </center>

        <div class="row mb-5">
    <!-- Card 1 -->
    <div class="col-lg-3 col-sm-6 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="/productos?categoria=1">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/accesorios0.jpg" alt="">
                <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                <i class="fas fa-gem fa-2x "></i>
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">ACCESORIOS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="/productos?categoria=3">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/postres0.jpg" alt="">
                <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                <i class="fas fa-cake fa-2x "></i>
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">COMIDA</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 3 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="/productos?categoria=4">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/ropa.jpg" alt="">
                <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                <i class="fas fa-shirt fa-2x "></i>
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">ROPA</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 4 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-5">
        <a class="text-light" href="/productos?categoria=2">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/artesanias.jpg" alt="">
                <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                <i class="fas fa-masks-theater fa-2x "></i>
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">ARTESANÍAS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row mb-5">
    <!-- Card 5 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
                <a class="text-light" href="/productos?categoria=5">
                    <div class="hover hover-1 text-white rounded">
                        <img src="imagenes/categorias/plantas.jpg" alt="">
                        <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                            <i class="fas fa-leaf fa-2x "></i> 
                            <h3 class="hover-1-title text-uppercase mb-0">
                                <center>
                                    <span class="font-weight-light fw-bold">PLANTAS</span>
                                </center>
                            </h3>
                        </div>
                    </div>
                </a>
            </div>

    <!-- Card 6 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="/productos?categoria=6">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/personal.jpg" alt="">
                <div class="hover-1-content px-5 py-4 d-flex flex-column align-items-center">
                <i class="fas fa-pump-soap fa-2x "></i> 
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">CUIDADO PERSONAL</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 7 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="/servicios">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/servicios.jpg" alt="">
                <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                <i class="fas fa-camera fa-2x "></i> 
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">SERVICIOS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 8 -->
    <div class="col-lg-3 col-sm-6 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="/productos?categoria=7">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/garaje.jpg" alt="">
                <div class="hover-1-content px-5 py-5 d-flex flex-column align-items-center">
                <i class="fas fa-box fa-2x "></i> 
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <center>
                            <span class="font-weight-light fw-bold">VENTA DE GARAJE</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>
</div>

        </div>
        </div>
    
    
    <div class="p-4 p-md-5 mb-4 text-white bg-success" style="margin-top: 120px; margin-bottom: 100px; ">
    <div class="col-md-6 px-0">
      <h1 class="display-5 fst-italic">¿Tienes un emprendimiento?</h1>
      <p class="lead my-3">EmprendeMás es un proyecto innovador diseñado para apoyar a las microempresas y pequeños emprendimientos en la comercialización de sus productos e impulso en el mercado, además facilitamos el proceso de compra para los usuarios. <br><br> ¡Únete a EmprendeMás!</p>

    </div>
  </div>


  <center>
    <h3 class="fw-bold" style="margin-bottom: 30px; margin-top: 80px;">ÚNETE A EMPRENDEMÁS</h3>
</center>

  <div class="container mt-5 d-flex justify-content-center">
    <div class="row g-2">
        <div class="col-lg-6 col-sm-12 pe-lg-5 mb-sm-5 d-flex justify-content-center">
            <div class="card shadow-sm" style="width: 30rem; height: 20rem;">
            <img src="imagenes/home/clientess.jpg" class="card-img-top" style="width: 100%; height: 170px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-text" style="font-size: 15px">Adquiere productos de calidad, con precios justos, solo con unos clicks. <br> ¡Obten productos en la puerta de tu hogar!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="/register">
                            <button type="button" class="btn btn-sm fw-semibold btn-outline-success">Iniciar como cliente</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 ps-lg-5 d-flex justify-content-center">
            <div class="card shadow-sm" style="width: 30rem; height: 20rem;">
            <img src="imagenes/home/vendedora.jpg" class="card-img-top" style="width: 100%; height: 170px; object-fit: cover;">
                <div class="card-body">
                    <p class="card-text" style="font-size: 15px">Agrega tu emprendimiento y da a conocer tus productos y/o servicios. <br> ¡Comienza a generar dinero por medio de nuestra web!</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="/register">
                            <button type="button" class="btn btn-sm fw-semibold btn-outline-primary">Iniciar como vendedor</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</section>


<!-- Incluir jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Incluir Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Incluir Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@endsection
