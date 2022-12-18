<?php

use App\Http\Controllers\BebidasController;
use App\Http\Controllers\PlatosEspecialesController;
use App\Http\Controllers\PolloBrasaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\TipoPlatoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Models\polloBrasa;
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
Route::view('bienvenido','bienvenido')->middleware('auth');
// Route::post('/identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('/logout',[UserController::class,'salir'])->name('logout');

Route::resource('polloBrasa', PolloBrasaController::class);
Route::resource('especiales',PlatosEspecialesController::class);
Route::resource('bebidas', BebidasController::class);
Route::resource('menu', MenuController::class);
Route::resource('pedidos', PedidosController::class);
Route::get('registro/{id}',[PedidosController::class,'registro'] )->name('registrar');
Route::get('pdf/{id}',[PedidosController::class,'viewpdf'] )->name('pdf');
Route::get('/estadisticas',[PedidosController::class,'estadisticas'])->name('estadisticas');
Route::resource('tipoplato', TipoPlatoController::class);


// LOGIN
Route::get('login', function () {
    return view('login.iniciar');
});