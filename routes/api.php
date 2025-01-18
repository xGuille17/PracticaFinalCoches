<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\EmpleadoController;

Route::apiResource('coches', CocheController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('ventas', VentaController::class);
Route::apiResource('empleados', EmpleadoController::class);
