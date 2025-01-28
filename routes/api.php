<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\EmpleadoController;

Route::apiResource('coches', CocheController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('empleados', EmpleadoController::class);
Route::apiResource('ventas', VentaController::class);

// Rutas personalizadas para detalle de empleado:
Route::post('empleados/{id}/detalle', [EmpleadoController::class, 'storeDetalle']);
Route::get('empleados/{id}/detalle', [EmpleadoController::class, 'showDetalle']);
Route::put('empleados/{id}/detalle', [EmpleadoController::class, 'updateDetalle']);
Route::delete('empleados/{id}/detalle', [EmpleadoController::class, 'destroyDetalle']);
