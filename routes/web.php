<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\clienteController;

Route::get('/', function () {
    return view('admin.principal');
});
Route::resource('productos',ProductoController::class);
Route::get('clientes', [clienteController::class, 'index'])->name('clientes.index');
