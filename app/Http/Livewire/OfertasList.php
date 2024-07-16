<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarritoCompra;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class OfertasList extends Component
{
    public $ofertaCont;
    public $search = '';
    public $sinResultados = '';

    public function render()
    {
        if(Auth::check() && Auth::user()->hasRole('Vendedor')) {
            $this->ofertaCont = Producto::where('oferta', true)
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->whereHas('vendedor', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->get();
        } else {
            $this->ofertaCont = Producto::where('oferta', true)
                ->where('nombre', 'like', '%' . $this->search . '%')
                ->get();
        }

        if ($this->ofertaCont->isEmpty() && !empty($this->search)) {
            $this->sinResultados = 'No se encontraron coincidencias.';
            $this->dispatchBrowserEvent('show-no-results-alert');
        } else {
            $this->sinResultados = '';
        }

        return view('livewire.ofertas-list');
    }

    public function agregarCarro($id)
    {
        if (auth()->user()) {

            $data = [
                'user_id' => auth()->user()->id,
                'producto_id' => $id,
            ];
            
            $carritoItem = CarritoCompra::where($data)->first();

            if ($carritoItem) {
                session()->flash('error', 'La oferta ya se encuentra en el carrito.');
            } else {
                CarritoCompra::create($data);
                $this->emit('updateCartCount');
                session()->flash('success', 'Oferta agregada al carrito exitosamente.');
            }
        }
    }
    public $id_eliminacion;

    protected $listeners = ['confirmacionEliminacion'=>'eliminarProducto'];

    public function eliminacion($id) {
        $this->id_eliminacion = $id;
        $this->dispatchBrowserEvent('eliminacion-producto');
    }

    public function eliminarProducto() {
        $producto = Producto::where('id', $this->id_eliminacion)->first();
        $producto->delete();

        $this->dispatchBrowserEvent('productoEliminado');
    }    
}