<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('producto',[ProductoController::class,'index'])->name('producto.index');
Route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('producto/store',[ProductoController::class,'store'])->name('producto.store');

Route::get('producto/edit/{id}',[ProductoController::class,'edit'])->name('producto.edit');
Route::post('producto/update/{id}',[ProductoController::class,'update'])->name('producto.update');

Route::delete('producto/delete/{id}',[ProductoController::class, 'delete'])->name('producto.delete');
