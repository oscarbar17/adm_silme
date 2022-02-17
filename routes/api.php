<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadosController;
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
Route::post('login.store', [EmpleadosController::class, 'getDatosApi'])->name('login.store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
