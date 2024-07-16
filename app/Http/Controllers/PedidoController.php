<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Vendedore;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\CarritoCompra;
use App\Models\DetallePedido;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;

        if ($user->hasRole('Vendedor')){
            $pedidos = Pedido::whereHas('detalles', function ($query) use ($userId) {
                $query->where('id_vendedor', $userId);
            })->get();

            $pedidos->each(function ($pedido) use ($userId) {
                $pedido->detalles = $pedido->detalles->filter(function ($detalle) use ($userId) {
                    return $detalle->id_vendedor == $userId;
                });
            });
        } elseif ($user->hasRole('Cliente')) {
            $pedidos = Pedido::where('id_cliente', $userId)->with('detalles')->get();
        }

        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $carritoitems = CarritoCompra::where('user_id', $user->id)->get();

        $sub_total = 0;
        $valorTotalProducto = 0;
        $valorTotalServicio = 0;
        $carritoitemsArray = [];

        foreach ($carritoitems as $item) {
            $itemArray = [];
            if ($item->producto) {                
                $valorTotalProducto = $item->producto->valor_final * $item->cantidad;
                $sub_total += $item->producto->valor_final * $item->cantidad;
                $itemArray = [
                    'id' => $item->producto->id,
                    'tipo' => 'producto',
                    'nombre' => $item->producto->nombre,
                    'valor_final' => $item->producto->valor_final,
                    'cantidad' => $item->cantidad,
                    'id_vendedor' => $item->producto->vendedor_id,
                ];
            } elseif ($item->servicio) {
                $valorTotalServicio = $item->servicio->valor_final * $item->cantidad;
                $sub_total += $item->servicio->valor_final * $item->cantidad;
                $itemArray = [
                    'id' => $item->servicio->id,
                    'tipo' => 'servicio',
                    'nombre' => $item->servicio->nombre,
                    'valor_final' => $item->servicio->valor_final,
                    'cantidad' => $item->cantidad,
                    'id_vendedor' => $item->servicio->vendedor_id,
                ];
            }
            $carritoitemsArray[] = $itemArray;
        }
        $envio = 8000;
        $total = $sub_total + $envio;

        return view('pedidos.create', compact('carritoitemsArray', 'sub_total', 'envio', 'total', 'valorTotalProducto', 'valorTotalServicio'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            'direccion' => 'required|string',
            'telefono' => 'required|integer|min:1',
            'ciudad' => 'required|string',
            'total' => 'required|string',
            'pago' => 'required|string|in:Paypal,Efecty,Visa,PSE',
            'carritoitemsArray' => 'required|array',
        ]);

        $clienteId = auth()->user()->id;
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $direccion = $request->input('direccion');
        $ciudad = $request->input('ciudad');
        $telefono = $request->input('telefono');
        $pago = $request->input('pago');
        $total = $request->input('total');

        $pedido = new Pedido();
        $pedido->id_cliente = $clienteId;
        $pedido->nombre_cl = $nombre;
        $pedido->email_cl = $email;
        $pedido->direccion = $direccion;
        $pedido->ciudad = $ciudad;
        $pedido->telefono = $telefono;
        $pedido->pago = $pago;
        $pedido->total = $total;
        $pedido->save();

        foreach ($request->input('carritoitemsArray') as $item) {
            $item = json_decode($item, true);
            $detallePedido = new DetallePedido();
            $detallePedido->pedido_id = $pedido->id;
            $detallePedido->tipo = $item['tipo'];

            if ($item['tipo'] === 'producto') {
                $producto = Producto::find($item['id']);
                $vendedor = Vendedore::find($producto->vendedor_id);                    
                $detallePedido->producto_id = $producto->id;
                $detallePedido->cantidad = $item['cantidad'];
                $detallePedido->precio = $producto->valor_final;
                $detallePedido->id_vendedor = $vendedor->user_id;
                $detallePedido->estado = 'Pedido Aceptado';
                $producto->stock -= $item['cantidad'];
                $producto->save();
            } elseif ($item['tipo'] === 'servicio') {
                $servicio = Servicio::find($item['id']);
                $vendedorServicio = Vendedore::find($servicio->vendedor_id);   
                $detallePedido->servicio_id = $servicio->id;
                $detallePedido->cantidad = $item['cantidad'];
                $detallePedido->precio = $servicio->valor_final;            
                $detallePedido->id_vendedor = $vendedorServicio->user_id;
                $detallePedido->estado = 'Pedido Aceptado';
            }
            $detallePedido->save();
        }

        $this->eliminarItemDelCarrito($clienteId);
        
        return redirect()->route('pedidos.index')->with('success', 'Pedido realizados con éxito');
    }
    
    private function eliminarItemDelCarrito($clienteId)
    {
        CarritoCompra::where('user_id', $clienteId)->delete();
    }
    

    public function actualizarEstado(Request $request, $id)
    {
        $detallePedido = DetallePedido::findOrFail($id);
        $detallePedido->estado = $request->input('estado');
        $detallePedido->save();

        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}