<div class="InicioSesion container">
    <div class="row text-center mb-5">
      <div class="Sec_Emp col-lg-2 col-sm-6 d-flex align-items-center justify-content-center">
        <i class="fas fa-shirt icono" style="color: green; font-size: 18px;"></i>
        <a href="/productos" class="fw-bold" style="color: green;  font-size: 18px;">Productos</a>
        <hr class="w-200">
      </div>
      <div class="Sec_Zona col-lg-2 col-sm-6 me-3 d-flex align-items-center justify-content-center">
        <i class="fas fa-guitar icono" style="font-size: 20px;"></i>
        <a href="/servicios" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Servicios</a>
      </div>
      <div class="Sec_Emp col-lg-2 col-sm-6 me-3 mb-sm-1 d-flex align-items-center justify-content-center">
        <i class="fas fa-shop icono" style="font-size: 17px;"></i>
        <a href="/emprendimientos" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Emprendimientos</a>
      </div>
      <div class="dropdown col-lg-2 me-4 d-flex align-items-center justify-content-center" id="userDropdown">
        <i class="fas fa-tag icono"></i>
        <a href="#" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas</a>
        <div class="dropdown-content">
          <a href="/ofertas" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas productos</a>
          <a href="/ofertas_servicios" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Ofertas servicios</a>
        </div>
      </div>
      <div class="Sec_Ofe col-lg-1 col-sm-6 me-4 d-flex align-items-center justify-content-center">
        <i class="fas fa-scroll icono"></i>
        <a href="/pedidos_index" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Pedidos</a>
      </div>
      @can('agregarVendedor')
      <div class="Sec_Ofe col-lg-2 col-sm-6  d-flex align-items-center justify-content-center">
        <i class="fas fa-clipboard icono"></i>
        <a href="/inventario" class="fw-bold" style="color: #33B66C;  font-size: 18px;">Inventario</a>
      </div>
      @endcan
    </div>
  </div>