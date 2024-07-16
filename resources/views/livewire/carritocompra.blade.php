<div class="min-h-screen pt-3">
  <h1 class="mb-10 text-center text-2xl font-bold " style="color: green">Productos en tu Carrito <i class="fas fa-shopping-cart"></i></h1>
  <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
    <div class="rounded-lg md:w-2/3">
      @if($carritoitems->isEmpty())
        <div class="max-w-lg mx-auto">
          <div class="alert alert-success text-center" role="alert">
            No tienes productos en tu carrito de compras.
          </div>
        </div>
      @else
        @foreach($carritoitems as $item)
          <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start" style="min-height: 200px;">
            @if($item->producto)
              <img src="imagenes/productos/{{$item->producto->imagen}}" alt="product-image" class="w-40 h-40 object-cover rounded-lg sm:w-40" />
              <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between sm:items-center">
                <div>
                  <h2 class="text-lg font-bold text-gray-900">{{$item->producto->nombre}}</h2>
                  <p class="mt-1 text-xs text-gray-700" style="font-size: 18px">${{number_format($item->producto->valor_final)}}</p>
                </div>
                <div class="mt-4 flex flex-col items-center sm:space-y-6 sm:mt-0 sm:flex sm:flex-row sm:items-center sm:space-x-6">
                  <div class="flex items-center gap-1 border-gray-100">
                    <button class="w-7 h-7 rounded-full border border-gray-300 cursor-pointer" wire:click="decrementCant({{ $item->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                      </svg>
                    </button>
                    <input type="text" readonly="readonly" value="{{$item->cantidad}}" class="w-9 h-9 text-center text-gray-900 text-sm outline-none border border-gray-300 rounded-sm">
                    <button class="w-7 h-7 rounded-full border border-gray-300 cursor-pointer" wire:click="incrementCant({{ $item->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M12 5v14M5 12h14" />
                      </svg>
                    </button>
                  </div>
                  <div class="flex items-center space-x-4 mt-2 sm:mt-0">
                    <p class="mb-2 fw-semibold" style="font-size: 18px; color: green">${{number_format($item->producto->valor_final * $item->cantidad)}}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 cursor-pointer mb-2  duration-150 hover:text-red-500" wire:click="eliminarItem({{ $item->id }})">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </div>
                </div>
              </div>
            @elseif($item->servicio)
              <img src="imagenes/servicios/{{$item->servicio->imagen}}" alt="servicio-image" class="w-40 h-40 object-cover rounded-lg sm:w-40" />
              <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between sm:items-center">
                <div>
                  <h2 class="text-lg font-bold text-gray-900">{{$item->servicio->nombre}}</h2>
                  <p class="mt-1 text-xs text-gray-700" style="font-size: 18px">${{ number_format($item->servicio->valor_final)}}</p>
                </div>
                <div class="mt-4 flex flex-col items-center sm:space-y-6 sm:mt-0 sm:flex sm:flex-row sm:items-center sm:space-x-6">
                  <div class="flex items-center gap-1 border-gray-100">
                    <button class="w-7 h-7 rounded-full border border-gray-300 cursor-pointer" wire:click="decrementCant({{ $item->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                      </svg>
                    </button>
                    <input type="text" readonly="readonly" value="{{$item->cantidad}}" class="w-9 h-9 text-center text-gray-900 text-sm outline-none border border-gray-300 rounded-sm">
                    <button class="w-7 h-7 rounded-full border border-gray-300 cursor-pointer" wire:click="incrementCant({{ $item->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M12 5v14M5 12h14" />
                      </svg>
                    </button>
                  </div>
                  <div class="flex items-center space-x-4 mt-2 sm:mt-0">
                    <p class="mb-2 fw-semibold" style="font-size: 18px; color: green">${{number_format ($item->servicio->valor_final* $item->cantidad) }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 mb-2 cursor-pointer duration-150 hover:text-red-500" wire:click="eliminarItem({{ $item->id }})">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </div>
                </div>
              </div>
            @endif
          </div>
        @endforeach
      @endif
    </div>
    <!-- Sub total -->
    <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
      <div class="mb-2 flex justify-between">
        <p class="text-gray-700">Subtotal</p>
        <p class="text-gray-700">${{ number_format($sub_total) }}</p>
      </div>
      <div class="flex justify-between">
        <p class="text-gray-700">Envio</p>
        <p class="text-gray-700">${{ number_format( $this->envio) }}</p>
      </div>
      <hr class="my-4" />
      <div class="flex justify-between">
        <p class="text-lg font-bold">Total</p>
        <div class="">
          <p class="mb-1 text-lg font-bold">${{ number_format($this->total) }}</p>
        </div>
      </div>
      @if(!$carritoitems->isEmpty())
        <div class="text-center mt-4">
            <a href="{{ route('pedidos.create', [
                'items' => $carritoitems,
                'total' => $total,
            ]) }}" class="btn fw-semibold btn-success">Pagar <i class="fas fa-money-bill-wave"></i></a>
        </div>
      @endif
    </div>
  </div>
</div>
