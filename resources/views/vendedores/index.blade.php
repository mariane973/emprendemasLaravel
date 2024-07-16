@extends('layouts.navbar')
@section('titulo', 'Emprendimientos')
@section('content')
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
      <div class="Sec_Emp col-lg-2 mb-sm-3 col-sm-6 col-md-12 d-flex align-items-center justify-content-center">
        <i class="fas fa-shirt icono me-1 me-1" style="color: #33B66C; font-size: 18px;"></i>
        <a href="/productos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Productos</a>
        <hr class="w-200">
      </div>
      <div class="Sec_Zona col-lg-2 mb-sm-3 col-sm-5 col-md-6 me-3 d-flex align-items-center justify-content-center">
        <i class="fas fa-guitar icono me-1" style="font-size: 20px;"></i>
        <a href="/servicios" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Servicios</a>
      </div>
      <div class="Sec_Emp col-lg-2 mb-sm-3 col-sm-6 col-md-6 mb-sm-1 d-flex align-items-center justify-content-center">
        <i class="fas fa-shop icono me-1" style="font-size: 17px; color: green; "></i>
        <a href="/emprendimientos" class="fw-bold" style="color: green;  font-size: 18px;">Emprendimientos</a>
      </div>
      <div class="dropdown col-lg-2 mb-sm-3 me-2 d-flex align-items-center justify-content-center" id="userDropdown">
        <i class="fas fa-tag icono me-1"></i>
        <a href="#" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas</a>
        <div class="dropdown-content" style="margin-top: 110px">
          <a href="/ofertas" class="fw-bold" style="color: #33B66C;  font-size: 15px;">Ofertas productos</a>
          <a href="/ofertas_servicios" class="fw-bold" style="color: #33B66C;  font-size: 16px;">Ofertas servicios</a>
        </div>
      </div>
      <div class="Sec_Ofe col-lg-1  mb-sm-3 ms-sm-4 col-sm-6 col-md-6 me-4 d-flex align-items-center justify-content-center">
        <i class="fas fa-scroll icono me-1"></i>
        <a href="/pedidos_index" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Pedidos</a>
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
  <div class="Sec_Emp col-lg-2 col-sm-6 col-md-12 d-flex align-items-center justify-content-center">
        <i class="fas fa-shirt icono me-1 me-1" style="color: #33B66C; font-size: 18px;"></i>
        <a href="/productos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Productos</a>
        <hr class="w-200">
      </div>
      <div class="Sec_Zona col-lg-2 col-sm-5 col-md-6 me-3 d-flex align-items-center justify-content-center">
        <i class="fas fa-guitar icono me-1" style="font-size: 20px;"></i>
        <a href="/servicios" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Servicios</a>
      </div>
      <div class="Sec_Emp col-lg-2 col-sm-6 col-md-6 mb-sm-1 d-flex align-items-center justify-content-center">
        <i class="fas fa-shop icono me-1" style="font-size: 17px; color: green; "></i>
        <a href="/emprendimientos" class="fw-bold" style="color: green;  font-size: 18px;">Emprendimientos</a>
      </div>
      <div class="dropdown col-lg-2 me-2 d-flex align-items-center justify-content-center" id="userDropdown">
        <i class="fas fa-tag icono me-1"></i>
        <a href="#" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas</a>
        <div class="dropdown-content" style="margin-top: 110px">
          <a href="/ofertas" class="fw-bold" style="color: #33B66C;  font-size: 15px;">Ofertas productos</a>
          <a href="/ofertas_servicios" class="fw-bold" style="color: #33B66C;  font-size: 16px;">Ofertas servicios</a>
        </div>
      </div>
      <div class="Sec_Ofe col-lg-1 col-sm-6 col-md-6 me-4 d-flex align-items-center justify-content-center">
        <i class="fas fa-scroll icono me-1"></i>
        <a href="/pedidos_index" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Pedidos</a>
      </div>
      @can('agregarVendedor')
      <div class="Sec_Ofe col-lg-2 col-sm-6 col-md-6  d-flex align-items-center justify-content-center">
        <i class="fas fa-clipboard icono me-1"></i>
        <a href="/inventario" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Inventario</a>
      </div>
      @endcan
    </div>
  </div>

  </div>
  </div>
</section>

<livewire:emprendimientoslist />

@endsection