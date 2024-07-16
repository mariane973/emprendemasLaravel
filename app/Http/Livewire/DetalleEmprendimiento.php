<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Vendedore;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\CarritoCompra;
use Illuminate\Support\Facades\Auth;


class DetalleEmprendimiento extends Component
{
    public $vendedor;
    public $productos;
    public $servicios;

    public function mount($id)
    {
        $this->vendedor = Vendedore::findOrFail($id);
        $this->productos = Producto::where('vendedor_id', $this->vendedor->id)->get();
        $this->servicios = Servicio::where('vendedor_id', $this->vendedor->id)->get();
    }

    public function render()
    {
        return view('livewire.detalle-emprendimiento');
    }

    public function agregarCarro($tipo, $id)
    {
        if (auth()->check()) {
            $data = [
                'user_id' => auth()->user()->id,
                $tipo . '_id' => $id,
            ];
           
            CarritoCompra::updateOrCreate($data);


            $this->emit('updateCartCount');
        }
    }
}