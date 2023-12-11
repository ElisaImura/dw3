<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\HolaController;

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

Route::get('/', function () {
    return view('welcome');
});

 
Route::get('/home', [HomeController::class, 'index']);

Route::get('pruebas/index',[HolaController::class,'index']); 



Route::get('clientes/index',[ClienteController::class,'index'])->name('Clienteindex');  
Route::get('clientes/formulario',[ClienteController::class,'formulario'])->name('ClienteNuevo');  
Route::post('clientes/crear', [ClienteController::class, 'crear'])->name('Clientecrear');
Route::get('clientes/eliminar/{id}',[ClienteController::class,'eliminar'])->name('Clienteeliminar');
Route::get('clientes/editar/{id}',[ClienteController::class,'editar'])->name('Clienteeditar');
Route::post('clientes/actualizar/{id}',[ClienteController::class,'actualizar'])->name('Clienteactualizar');
Route::get('clientes/ver/{id}',[ClienteController::class,'ver'])->name('Clientever');
Route::get('clientes/buscar',[ClienteController::class,'buscar'])->name('Clientebuscar');
Route::get('clientes.pdf',[ClienteController::class,'generarPDF'])->name('clientes.pdf');



Route::get('productos/index',[ProductoController::class,'index'])->name('Productoindex');  
Route::get('productos/formulario',[ProductoController::class,'formulario'])->name('ProductoNuevo');  
Route::post('productos/crear', [ProductoController::class, 'crear'])->name('Productocrear');
Route::get('productos/eliminar/{id}',[ProductoController::class,'eliminar'])->name('Productoeliminar');
Route::get('productos/editar/{id}',[ProductoController::class,'editar'])->name('Productoeditar');
Route::post('productos/actualizar/{id}',[ProductoController::class,'actualizar'])->name('Productoactualizar');
Route::get('productos/ver/{id}',[ProductoController::class,'ver'])->name('Productover');
Route::get('productos/buscar',[ProductoController::class,'buscar'])->name('Productobuscar');
Route::get('productos/index',[ProductoController::class,'index'])->name('Productoindex');  



Route::get('cargos/index',[CargoController::class,'index'])->name('Cargoindex');  
Route::get('cargos/formulario',[CargoController::class,'formulario'])->name('CargoNuevo');  
Route::post('cargos/crear', [CargoController::class, 'crear'])->name('Cargocrear');
Route::get('cargos/eliminar/{id}',[CargoController::class,'eliminar'])->name('Cargoeliminar');
Route::get('cargos/editar/{id}',[CargoController::class,'editar'])->name('Cargoeditar');
Route::post('cargos/actualizar/{id}',[CargoController::class,'actualizar'])->name('Cargoactualizar');
Route::get('cargos/ver/{id}',[CargoController::class,'ver'])->name('Cargover');
Route::get('cargos/buscar',[CargoController::class,'buscar'])->name('Cargobuscar');
Route::get('cargos/index',[CargoController::class,'index'])->name('Cargoindex');  