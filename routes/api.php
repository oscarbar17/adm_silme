<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ProductoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login.store', [AuthController::class, 'storeApi'])->name('login.store');

//-- EMPLEADOS
Route::post('empleados.get.data', [EmpleadosController::class, 'getDatosApi'])->name('empleados.get.data');
Route::post('empleados.update', [EmpleadosController::class, 'updateAPI'])->name('empleados.update');

//-- EVENTOS
Route::post('evento.show', [EventosController::class, 'getEventoApi'])->name('evento.show');
Route::post('eventos.get', [EventosController::class, 'getEventosApi'])->name('eventos.get');
Route::post('eventos.store', [EventosController::class, 'storeApi'])->name('eventos.store');
Route::post('eventos.update', [EventosController::class, 'updateApi'])->name('eventos.update');

//-- PRODUCTORES
Route::post('productores.store', [ProductoresController::class, 'storeApi'])->name('productores.store');

//-- CHECKS
Route::post('checks.store', [ChecksController::class, 'storeApi'])->name('checks.store');
Route::post('checks.update', [ChecksController::class, 'updateApi'])->name('checks.update');
Route::post('checks.last', [ChecksController::class, 'getLastActiveCheck'])->name('checks.last');

//-- API DATA
Route::post('api.data', [APIController::class, 'getAPIData'])->name('api.data');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
