<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Carritocompra;

class Cartcontador extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'obtenerCartItemCount'];

    public function render()
    {
        $this->obtenerCartItemCount();

        return view('livewire.cartcontador');
    }
    public function obtenerCartItemCount()
{
    if(auth()->check()) {
        $this->total = Carritocompra::whereUserId(auth()->user()->id)->count();
    } else {
        $this->total = 0;
    }
}

}
