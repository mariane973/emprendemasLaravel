<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\CarritoCompra as Carrito;
use Illuminate\Support\Facades\Auth;

class CarritoCompra extends Component
{
    public $carritoitems, $sub_total = 0, $total = 0, $envio = 8000;

    public function render()
    {
        if (Auth::check()) {
            $this->carritoitems = Carrito::with(['producto', 'servicio'])
                ->where('user_id', auth()->user()->id)
                ->get();
                
            $this->total = 0; $this->sub_total = 0;

            foreach ($this->carritoitems as $item) {
                if ($item->producto) {
                    $this->sub_total += $item->producto->valor_final * $item->cantidad;
                } elseif ($item->servicio) {
                    $this->sub_total += $item->servicio->valor_final * $item->cantidad;
                }
            }

            $this->total = $this->sub_total + $this->envio;
        } else {
            $this->carritoitems = collect(); // Carrito vacío si el usuario no está autenticado
            $this->sub_total = 0;
            $this->total = $this->envio;
        }

        return view('livewire.carritocompra');
    }

    public function incrementCant($id){
        $cart = Carrito::whereId($id)->first();
        if ($cart) {
            $cart->cantidad += 1;
            $cart->save();
            $this->recalcularTotales(); // Recalcular totales después de cambiar la cantidad
        }
    }

    public function decrementCant($id){
        $cart = Carrito::whereId($id)->first();
        if($cart && $cart->cantidad > 1){
            $cart->cantidad -= 1;
            $cart->save();
            $this->recalcularTotales(); // Recalcular totales después de cambiar la cantidad
        }
    }

    public function eliminarItem($id){
        $cart = Carrito::whereId($id)->first();
        if($cart){
            $cart->delete();
            $this->emit('updateCartCount');
            $this->recalcularTotales(); // Recalcular totales después de eliminar un ítem
        }
    }

    private function recalcularTotales(){
        $this->sub_total = 0;

        foreach ($this->carritoitems as $item) {
            if ($item->producto) {
                $this->sub_total += $item->producto->valor_final * $item->cantidad;
            } elseif ($item->servicio) {
                $this->sub_total += $item->servicio->valor_final * $item->cantidad;
            }
        }

        $this->total = $this->sub_total + $this->envio;
    }
}
