<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\TipoPlatoController;
use App\Http\Controllers\tipoUsuarioController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\UserController;
use App\Models\Pedido;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

// Route::get('/', function () {
//     return view('bienvenido');
// });
Route::get('/',[UserController::class,'showlogin'])->name('login')->middleware('guest');
Route::post('identificacion',[UserController::class,'verificalogin'])->name('identificacion')->middleware('guest');

Route::view('bienvenido','bienvenido')->middleware('auth');

// Route::post('/identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('/logout',[UserController::class,'salir'])->name('logout')->middleware('auth');

Route::get('/usuarios',[UserController::class,'index'])->name('usuarios')->middleware('auth');
Route::post('usuarios',[UserController::class,'store'])->name('usuarios.store')->middleware('auth');
Route::delete('usuarios/{id}',[UserController::class,'destroy'])->name('usuarios.destroy')->middleware('auth');

Route::resource('platos', PlatoController::class)->middleware('auth');
Route::post('platos/menu', [PlatoController::class,'setMenu'])->name('setMenu')->middleware('auth');

Route::get('pedidos/{fechaInicial?/{fechaFinal?}', [PedidoController::class, 'index'])->name('pedidos.index')->middleware('auth');
Route::get('pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create')->middleware('auth');
Route::post('pedidos', [PedidoController::class, 'store'])->name('pedidos.store')->middleware('auth');
Route::get('pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit')->middleware('auth');
Route::put('pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update')->middleware('auth');
Route::delete('pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy')->middleware('auth');
Route::get('pedidos/pdf/{pedido}',[PedidoController::class,'createPDF'] )->name('pedidos.pdf')->middleware('auth');
// Route::resource('pedidos', PedidoController::class)->middleware('auth');

Route::get('registro/',[PedidoController::class,'create'] )->name('registrar')->middleware('auth');
Route::get('registro/{pedido}',[PedidoController::class,'edit'] )->name('actualizar')->middleware('auth');

Route::get('/estadisticas',[DashboardController::class,'index'])->name('estadisticas')->middleware('auth');
Route::post('/estadisticas/vendidos',[DashboardController::class,'vendidos'])->name('vendidos')->middleware('auth');
Route::post('/estadisticas/ingresos',[DashboardController::class,'ingresos'])->name('ingresos')->middleware('auth');
Route::post('/estadisticas/delivery',[DashboardController::class,'delivery'])->name('delivery')->middleware('auth');
Route::post('/estadisticas/stock',[DashboardController::class,'stock'])->name('stock')->middleware('auth');

Route::resource('tipoplato', TipoPlatoController::class)->middleware('auth');

Route::resource('trabajadores',TrabajadoresController::class)->middleware('auth');

Route::resource('tipoUsuario', tipoUsuarioController::class)->middleware('auth');

// LOGIN
Route::get('login', function () {
    return view('login.iniciar');
});