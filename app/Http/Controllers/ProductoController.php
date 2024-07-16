<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Vendedore;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
         $query = Producto::query();
     
         if ($request->has('categoria')) {
             $categorias = $request->input('categoria');
             $query->where('categoria', $categorias);
         }
     
         $productos = $query->get();
         $categorias = Categoria::all();
     
         return view('productos.index', compact('productos', 'categorias'));
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $vendedores = $user->vendedores;
        $categorias = Categoria::all(); 

        return view('productos.create', compact('vendedores', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newProduct = new Producto();
        $imagen = $request->file('imagen');
        $nombreimg = time().'.'.$imagen -> getClientOriginalExtension();
        $destino = public_path('imagenes/productos');
        $request -> imagen -> move($destino,$nombreimg);

        $newProduct -> imagen = $nombreimg;
        $newProduct -> nombre = $request->get('nombre');
        $newProduct -> descripcion = $request->get('descripcion');
        $newProduct -> precio = $request->get('precio');
        $newProduct -> stock = $request->get('stock');
        $newProduct -> categoria = $request->get('categoria');
        $newProduct -> cantidad = $request->get('cantidad');
        $newProduct -> medida = $request->get('medida');
        $newProduct -> oferta = $request -> opcOferta == 'si';
        if($request -> opcOferta == 'si') {
            $newProduct -> descuento = $request->get('descuento');
            $newProduct -> valor_final = $request->get('valor_final');
        } else {
            $newProduct -> descuento = null;
            $newProduct -> valor_final = $request->get('precio');
        }
        $newProduct -> vendedor_id = $request->get('vendedor_id');

        $newProduct -> save();

        return redirect('/productos');
    }

    public function ofertasIndex()
    {
        return view('ofertas.index');
    }

    public function inventarioVendedor()
    {
        $user = Auth::user();

        $inventario = Producto::whereHas('vendedor', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('inventario.index', compact('inventario'));
    }

    public function actualizarStock(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto -> stock = $request->get('stock');

        $producto -> save();

        return redirect('/inventario');
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
        $productoEditar = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', [
            'productEditar' => $productoEditar,
            'categorias' => $categorias
        ]);
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
        $editarProducto = Producto::findOrFail($id);

        $editarProducto -> nombre = $request -> get('nombreEdit');
        $editarProducto -> descripcion = $request -> get('descripEdit');
        $editarProducto -> precio = $request -> get('precioEdit');
        $editarProducto -> stock = $request -> get('stockEdit');
        $editarProducto -> cantidad = $request -> get('cantidadEdit');
        $editarProducto -> medida = $request -> get('medidaEdit');
        $editarProducto -> categoria = $request -> get('categoriaEdit');

        if ($request->opcOferta == 'si') {
            $editarProducto->oferta = true;
            $editarProducto->descuento = $request->get('descuento');
            $editarProducto->valor_final = $request->get('valor_final');
        } else {
            $editarProducto->oferta = false;
            $editarProducto->descuento = null;
            $editarProducto->valor_final = $request->get('precioEdit');
        }
        
        if ($request->hasFile('imagen')) {
            if ($editarProducto->imagen) {
                $rutaImagenActual = public_path('imagenes/productos/' . $editarProducto->imagen);
                if (file_exists($rutaImagenActual)) {
                    unlink($rutaImagenActual);
                }
            }
    
            $imagen = $request->file('imagen');
            $nombreimg = time() . '.' . $imagen->getClientOriginalExtension();
            $destino = public_path('imagenes/productos');
            $imagen->move($destino, $nombreimg);
    
            $editarProducto->imagen = $nombreimg;
        }

        $editarProducto -> save();

        return redirect('/productos');
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
