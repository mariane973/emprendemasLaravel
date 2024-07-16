<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servicios.index');
    }

    public function ofertasServicios()
    {
        return view('ofertas.index_servicios');
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
        return view('servicios.create', compact('vendedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newServicio = new Servicio();
        $imagen = $request->file('imagen');
        $nombreimg = time().'.'.$imagen -> getClientOriginalExtension();
        $destino = public_path('imagenes/servicios');
        $request -> imagen -> move($destino,$nombreimg);

        $newServicio -> imagen = $nombreimg;
        $newServicio -> nombre = $request->get('nombre');
        $newServicio -> descripcion = $request->get('descripcion');
        $newServicio -> precio = $request->get('precio');
        $newServicio -> oferta = $request -> opcOferta == 'si';
        if($request -> opcOferta == 'si') {
            $newServicio -> descuento = $request->get('descuento');
            $newServicio -> valor_final = $request->get('valor_final');
        } else {
            $newServicio -> descuento = null;
            $newServicio -> valor_final = $request->get('precio');
        }
        $newServicio -> vendedor_id = $request->get('vendedor_id');

        $newServicio -> save();

        return redirect('/servicios');
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
        $servicioEditar = Servicio::findOrFail($id);
        return view('servicios.edit', [
            'serviciosEditar' => $servicioEditar
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
        $editarServicio = Servicio::findOrFail($id);

        $editarServicio -> nombre = $request -> get('nombreEdit');
        $editarServicio -> descripcion = $request -> get('descripEdit');
        $editarServicio -> precio = $request -> get('precioEdit');

        if ($request->opcOferta == 'si') {
            $editarServicio->oferta = true;
            $editarServicio->descuento = $request->get('descuento');
            $editarServicio->valor_final = $request->get('valor_final');
        } else {
            $editarServicio->oferta = false;
            $editarServicio->descuento = null;
            $editarServicio->valor_final = $request->get('precioEdit');
        }

        if ($request->hasFile('imagen')) {
            if ($editarServicio->imagen) {
                $rutaImagenActual = public_path('imagenes/servicios/' . $editarServicio->imagen);
                if (file_exists($rutaImagenActual)) {
                    unlink($rutaImagenActual);
                }
            }
    
            $imagen = $request->file('imagen');
            $nombreimg = time() . '.' . $imagen->getClientOriginalExtension();
            $destino = public_path('imagenes/servicios');
            $imagen->move($destino, $nombreimg);
    
            $editarServicio->imagen = $nombreimg;
        }

        $editarServicio -> save();
        return redirect('/servicios');
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
