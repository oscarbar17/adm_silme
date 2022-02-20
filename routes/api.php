<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EventosController;
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
Route::post('empleados.get.data', [EmpleadosController::class, 'getDatosApi'])->name('empleados.get.data');

Route::post('eventos.store', [EventosController::class, 'storeApi'])->name('eventos.store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
