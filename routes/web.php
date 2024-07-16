<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PasarelaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\InventarioController;
use App\Models\Servicio;
use App\Models\Vendedore;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('emprendemas');
});

Route::resource('/productos', ProductoController::class);

Route::resource('/emprendimientos', VendedorController::class);
Route::get('/emprendimientos/{id}/detalle', [VendedorController::class, 'mostrarEmprendimiento'])->name('vendedores.detalle');

Route::resource('/servicios',ServicioController::class);

Route::resource('/users', UserController::class);
Route::get('/users/{usuario}/confirmar',[UserController::class, 'eliminar']);

Route::get('/ofertas', [ProductoController::class, 'ofertasIndex'])->name('ofertas.index');

Route::get('/ofertas_servicios', [ServicioController::class, 'ofertasServicios'])->name('ofertas.index_servicios');

Route::get('/inventario', [ProductoController::class, 'inventarioVendedor'])->name('inventario.index');
Route::put('/inventario/{id}/stock', [ProductoController::class, 'actualizarStock'])->name('inventario.actualizarStock');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [UserController::class, 'index'])->name('profile');

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');


Route::post('/pagar/{producto_id}/{cantidad}/{precio}', [PasarelaController::class, 'pagar'])->name('pagar');

Route::get('/pasarela-pago/{producto_id}/{cantidad}/{precio}', [CompraController::class, 'pasarelaPago'])->name('pasarela.pago');

Route::get('/pedidos_index', [PedidoController::class, 'index'])->name('pedidos.index')->middleware('auth');

Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');

Route::put('/pedidos/{id}/estado', [PedidoController::class, 'actualizarEstado'])->name('pedido.actualizarEstado');

Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');