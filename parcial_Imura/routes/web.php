<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;

Route::get('/index',[ProfesorController::class,'index'])->name('index');  
Route::get('profesores/formulario',[ProfesorController::class,'formulario'])->name('nuevo');  
Route::post('/crear', [ProfesorController::class, 'crear'])->name('crear');
Route::get('/eliminar/{id}',[ProfesorController::class,'eliminar'])->name('eliminar');

Route::get('/editar/{id}',[ProfesorController::class,'editar'])->name('editar');
Route::post('/actualizar/{id}',[ProfesorController::class,'actualizar'])->name('actualizar');
Route::get('/ver/{id}',[ProfesorController::class,'ver'])->name('ver');
Route::get('/buscar',[ProfesorController::class,'buscar'])->name('buscar');
