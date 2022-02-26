<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductoresController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SucursalesController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'create'])->name('login.create');
Route::post('login.store', [AuthController::class, 'store'])->name('login.store');
Route::get('login.destroy', [AuthController::class, 'destroy'])->name('login.destroy');

Route::group( ['middleware' => 'auth'], function (){
    Route::get('home_admin', [HomeController::class, 'indexAdmin'])->name('home_admin.index');

    //--Empleados
    Route::get('empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
    Route::any('empleados_index.data', [EmpleadosController::class, 'indexDT'])->name('empleados_index.data');
    Route::get('empleados.create', [EmpleadosController::class, 'create'])->name('empleados.create');
    Route::post('empleados.store', [EmpleadosController::class, 'store'])->name('empleados.store');
    Route::get('empleados.edit/{id}', [EmpleadosController::class, 'edit'])->name('empleados.edit');
    Route::post('empleados.update', [EmpleadosController::class, 'update'])->name('empleados.update');
    Route::get('empleados.destroy/{id}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');
    Route::get('empleados.download_file/{id}/{type}', [EmpleadosController::class, 'downloadFile'])->name('empleados.download_file');
    Route::get('empleados.destroy_file/{id}/{type}', [EmpleadosController::class, 'destroyFile'])->name('empleados.destroy_file');

    //--Marcas
    Route::get('marcas', [MarcasController::class, 'index'])->name('marcas.index');
    Route::any('marcas_index.data', [MarcasController::class, 'indexDT'])->name('marcas_index.data');
    Route::get('marcas.create', [MarcasController::class, 'create'])->name('marcas.create');
    Route::post('marcas.store', [MarcasController::class, 'store'])->name('marcas.store');
    Route::get('marcas.edit/{id}', [MarcasController::class, 'edit'])->name('marcas.edit');
    Route::post('marcas.update', [MarcasController::class, 'update'])->name('marcas.update');
    Route::get('marcas.destroy/{id}', [MarcasController::class, 'destroy'])->name('marcas.destroy');

    //--Productos
    Route::get('productos', [ProductosController::class, 'index'])->name('productos.index');
    Route::any('productos_index.data', [ProductosController::class, 'indexDT'])->name('productos_index.data');
    Route::get('productos.create', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('productos.store', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('productos.edit/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::post('productos.update', [ProductosController::class, 'update'])->name('productos.update');
    Route::get('productos.destroy/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

    //--Productores
    Route::get('productores', [ProductoresController::class, 'index'])->name('productores.index');
    Route::any('productores_index.data', [ProductoresController::class, 'indexDT'])->name('productores_index.data');
    Route::get('productores.create', [ProductoresController::class, 'create'])->name('productores.create');
    Route::post('productores.store', [ProductoresController::class, 'store'])->name('productores.store');
    Route::get('productores.edit/{id}', [ProductoresController::class, 'edit'])->name('productores.edit');
    Route::post('productores.update', [ProductoresController::class, 'update'])->name('productores.update');
    Route::get('productores.destroy/{id}', [ProductoresController::class, 'destroy'])->name('productores.destroy');

    //--Sucursales
    Route::get('sucursales', [SucursalesController::class, 'index'])->name('sucursales.index');
    Route::any('sucursales_index.data', [SucursalesController::class, 'indexDT'])->name('sucursales_index.data');
    Route::get('sucursales.create', [SucursalesController::class, 'create'])->name('sucursales.create');
    Route::post('sucursales.store', [SucursalesController::class, 'store'])->name('sucursales.store');
    Route::get('sucursales.edit/{id}', [SucursalesController::class, 'edit'])->name('sucursales.edit');
    Route::post('sucursales.update', [SucursalesController::class, 'update'])->name('sucursales.update');
    Route::get('sucursales.destroy/{id}', [SucursalesController::class, 'destroy'])->name('sucursales.destroy');

    //--Eventos
    Route::get('eventos', [EventosController::class, 'index'])->name('eventos.index');
    Route::any('eventos.index.data', [EventosController::class, 'indexDT'])->name('eventos.index.data');
    Route::get('evento/{id}', [EventosController::class, 'show'])->name('eventos.show');

    Route::get('image/{filename}', [EventosController::class, 'displayImage'])->name('image.displayImage');


});