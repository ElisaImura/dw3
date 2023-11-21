<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
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



Route::get('clientes/index',[ClienteController::class,'index'])->name('index');  
Route::get('clientes/formulario',[ClienteController::class,'formulario'])->name('nuevo');  
Route::post('clientes/crear', [ClienteController::class, 'crear'])->name('crear');
Route::get('clientes/eliminar/{id}',[ClienteController::class,'eliminar'])->name('eliminar');
Route::get('clientes/editar/{id}',[ClienteController::class,'editar'])->name('editar');
Route::post('clientes/actualizar/{id}',[ClienteController::class,'actualizar'])->name('actualizar');
Route::get('clientes/ver/{id}',[ClienteController::class,'ver'])->name('ver');
Route::get('clientes/buscar',[ClienteController::class,'buscar'])->name('buscar');



Route::get('productos/index',[ProductoController::class,'index'])->name('index');  
Route::get('productos/formulario',[ProductoController::class,'formulario'])->name('nuevo');  
Route::post('productos/crear', [ProductoController::class, 'crear'])->name('crear');
Route::get('productos/eliminar/{id}',[ProductoController::class,'eliminar'])->name('eliminar');
Route::get('productos/editar/{id}',[ProductoController::class,'editar'])->name('editar');
Route::post('productos/actualizar/{id}',[ProductoController::class,'actualizar'])->name('actualizar');
Route::get('productos/ver/{id}',[ProductoController::class,'ver'])->name('ver');
Route::get('productos/buscar',[ProductoController::class,'buscar'])->name('buscar');
Route::get('productos/index',[ProductoController::class,'index'])->name('index');  



