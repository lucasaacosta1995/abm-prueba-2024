<?php

use App\Http\Controllers\Admin\ProductoServicioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/productos-servicios', [ProductoServicioController::class, 'index'])->name('productos-servicios.index');
    Route::get('/productos-servicios/create', [ProductoServicioController::class, 'create'])->name('productos-servicios.create');
    Route::post('/productos-servicios', [ProductoServicioController::class, 'store'])->name('productos-servicios.store');
    Route::get('/productos-servicios/{id}/edit', [ProductoServicioController::class, 'edit'])->name('productos-servicios.edit');
    Route::put('/productos-servicios/{id}', [ProductoServicioController::class, 'update'])->name('productos-servicios.update');
    Route::delete('/productos-servicios/{id}', [ProductoServicioController::class, 'destroy'])->name('productos-servicios.destroy');
});



