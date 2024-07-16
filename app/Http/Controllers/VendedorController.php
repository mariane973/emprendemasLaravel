<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedore;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendedores.index');
    }

    public function mostrarEmprendimiento($id)
    {
        $vendedor = Vendedore::find($id);

        return view('vendedores.detalle', compact('vendedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newVendedor = new Vendedore();
        $logo = $request->file('logo');
        $nombreimg = time().'.'.$logo -> getClientOriginalExtension();
        $destino = public_path('imagenes/emprendimientos');
        $request -> logo -> move($destino,$nombreimg);

        $newVendedor -> logo = $nombreimg;
        $newVendedor -> nom_emprendimiento = $request->get('nom_emprendimiento');
        $newVendedor -> descrip_emprendimiento = $request->get('descrip_emprendimiento');
        $newVendedor -> telefono = $request->get('telefono');
        $newVendedor -> direccion = $request->get('direccion');
        $newVendedor -> ciudad = $request->get('ciudad');
        $newVendedor -> user_id = Auth::id();

        $newVendedor -> save();

        return redirect('/emprendimientos');
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
        $vendedorEditar = Vendedore::findOrFail($id);
        return view('vendedores.edit', [
            'vendedorEditar' => $vendedorEditar
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
        $editVendedor = Vendedore::findOrFail($id);

        $editVendedor -> nom_emprendimiento = $request->get('nom_emprendimientoEdit');
        $editVendedor -> descrip_emprendimiento = $request->get('descrip_emprendimientoEdit');
        $editVendedor -> telefono = $request->get('telefonoEdit');
        $editVendedor -> direccion = $request->get('direccionEdit');
        $editVendedor -> ciudad = $request->get('ciudadEdit');

        if ($request->hasFile('logoEdit')) {
            if ($editVendedor->logo) {
                $rutaImagenActual = public_path('imagenes/emprendimientos/' . $editVendedor->logo);
                if (file_exists($rutaImagenActual)) {
                    unlink($rutaImagenActual);
                }
            }
    
            $logo = $request->file('logoEdit');
            $nombreimg = time() . '.' . $logo->getClientOriginalExtension();
            $destino = public_path('imagenes/emprendimientos');
            $logo->move($destino, $nombreimg);
    
            $editVendedor -> logo = $nombreimg;
        }

        $editVendedor -> save();

        return redirect('/emprendimientos');
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