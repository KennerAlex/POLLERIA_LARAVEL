<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\TipoPlatoController;
use App\Http\Controllers\tipoUsuarioController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
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
Route::view('bienvenido','bienvenido')->middleware('auth');
// Route::post('/identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('/logout',[UserController::class,'salir'])->name('logout');

Route::resource('platos', PlatoController::class);

Route::resource('pedidos', PedidoController::class);
Route::get('registro/',[PedidoController::class,'create'] )->name('registrar');
Route::get('registro/{pedido}',[PedidoController::class,'edit'] )->name('actualizar');
Route::get('pdf/{id}',[PedidoController::class,'viewpdf'] )->name('pdf');
Route::get('/estadisticas',[PedidoController::class,'estadisticas'])->name('estadisticas');
Route::resource('tipoplato', TipoPlatoController::class);
Route::resource('trabajadores',TrabajadoresController::class);
Route::resource('tipoUsuario', tipoUsuarioController::class);

// LOGIN
Route::get('login', function () {
    return view('login.iniciar');
});