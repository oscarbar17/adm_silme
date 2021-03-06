<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidenciasEmpleadosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProductoresController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\UsersController;
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
    return redirect(route('login.create'));
});
/*
Route::get('activity', [TelegramController::class, 'updatedActivity'])->name('activity');
Route::get('send', [TelegramController::class, 'sendMessage'])->name('send');
*/
Route::get('login', [AuthController::class, 'create'])->name('login.create');
Route::post('login.store', [AuthController::class, 'store'])->name('login.store');
Route::get('login.destroy', [AuthController::class, 'destroy'])->name('login.destroy');

Route::get('terminos_y_condiciones', function () {
    return view('website.terminos_condiciones');
});

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
    
    //--Incidencias Empleados
    Route::get('incidencias_empleados', [IncidenciasEmpleadosController::class, 'index'])->name('incidencias_empleados.index');
    Route::any('incidencias_empleados_index.data', [IncidenciasEmpleadosController::class, 'indexDT'])->name('incidencias_empleados_index.data');
    Route::get('incidencias_empleados.create', [IncidenciasEmpleadosController::class, 'create'])->name('incidencias_empleados.create');
    Route::post('incidencias_empleados.store', [IncidenciasEmpleadosController::class, 'store'])->name('incidencias_empleados.store');
    Route::get('incidencias_empleados.destroy/{id}', [IncidenciasEmpleadosController::class, 'destroy'])->name('incidencias_empleados.destroy');
    Route::post('incidencias_empleados.export', [IncidenciasEmpleadosController::class, 'export'])->name('incidencias_empleados.export');

    //--Marcas
    Route::get('marcas', [MarcasController::class, 'index'])->name('marcas.index');
    Route::any('marcas_index.data', [MarcasController::class, 'indexDT'])->name('marcas_index.data');
    Route::get('marcas.create', [MarcasController::class, 'create'])->name('marcas.create');
    Route::post('marcas.store', [MarcasController::class, 'store'])->name('marcas.store');
    Route::get('marcas.edit/{id}', [MarcasController::class, 'edit'])->name('marcas.edit');
    Route::post('marcas.update', [MarcasController::class, 'update'])->name('marcas.update');
    Route::get('marcas.destroy/{id}', [MarcasController::class, 'destroy'])->name('marcas.destroy');
    Route::get('marcas.export', [MarcasController::class, 'export'])->name('marcas.export');

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
    Route::get('productores.export', [ProductoresController::class, 'export'])->name('productores.export');

    //--Sucursales
    Route::get('sucursales', [SucursalesController::class, 'index'])->name('sucursales.index');
    Route::any('sucursales_index.data', [SucursalesController::class, 'indexDT'])->name('sucursales_index.data');
    Route::get('sucursales.create', [SucursalesController::class, 'create'])->name('sucursales.create');
    Route::post('sucursales.store', [SucursalesController::class, 'store'])->name('sucursales.store');
    Route::get('sucursales.edit/{id}', [SucursalesController::class, 'edit'])->name('sucursales.edit');
    Route::post('sucursales.update', [SucursalesController::class, 'update'])->name('sucursales.update');
    Route::get('sucursales.destroy/{id}', [SucursalesController::class, 'destroy'])->name('sucursales.destroy');
    Route::get('sucursales.export', [SucursalesController::class, 'export'])->name('sucursales.export');

    //--Eventos
    Route::get('events', [EventosController::class, 'index'])->name('events.index');
    Route::any('events.index.data', [EventosController::class, 'indexDT'])->name('events.index.data');
    Route::get('event/{id}', [EventosController::class, 'show'])->name('events.show');
    Route::post('events.export', [EventosController::class, 'export'])->name('events.export');

    //--Checks
    Route::get('checks', [ChecksController::class, 'index'])->name('checks.index');
    Route::any('checks.index.data', [ChecksController::class, 'indexDT'])->name('checks.index.data');
    Route::get('check/{id}', [ChecksController::class, 'show'])->name('checks.show');
    Route::post('checks.export', [ChecksController::class, 'export'])->name('checks.export');

    //--Usuarios
    Route::get('usuarios', [UsersController::class, 'index'])->name('usuarios.index');
    Route::any('usuarios_index.data', [UsersController::class, 'indexDT'])->name('usuarios_index.data');
    Route::get('usuarios.edit_password/{id}', [UsersController::class, 'editPassword'])->name('usuarios.edit_password');
    Route::post('usuarios.update_password', [UsersController::class, 'updatePassword'])->name('usuarios.update_password');

});