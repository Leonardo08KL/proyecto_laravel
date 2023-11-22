<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SolicitudController;
use App\Http\Controllers\EjemploApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\VentaController;
use App\Http\Controllers\Api\VentaDetalleController;

Route::middleware('auth:sanctum')->group(
    function () {
        Route::apiResource('solicitud', SolicitudController::class);
        Route::apiResource('ejemploApi', EjemploApiController::class);
        //Route::get('/empleados', [EmpleadoController::class, 'index']);
<<<<<<< HEAD
    
        // Tabla Empleados
        Route::post('/empleados', [EmpleadoController::class, 'store']);
        Route::get('/empleados', [EmpleadoController::class, 'index']);
        Route::delete('/empleados/{EmpleadoID}', [EmpleadoController::class, 'destroy']);
        Route::put('/empleados/{EmpleadoID}', [EmpleadoController::class, 'update']);
        Route::get('/empleados', [EmpleadoController::class, 'show']);

        //Tabla Productos
        Route::post('/productos', [ProductoController::class, 'store']);
        Route::get('/productos', [ProductoController::class, 'index']);
        Route::delete('/productos/{ProductoID}', [ProductoController::class, 'destroy']);
        Route::put('/productos/{ProductoID}', [ProductoController::class, 'update']);
        Route::get('/productos', [ProductoController::class, 'show']);
=======
>>>>>>> refs/remotes/origin/main
    }
);

Route::apiResource('solicitud', SolicitudController::class);
<<<<<<< HEAD
Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::get('/empleados/{EmpleadoID}', [EmpleadoController::class, 'show']);
Route::delete('/empleados/{EmpleadoID}', [EmpleadoController::class, 'destroy']);
=======
>>>>>>> refs/remotes/origin/main

//Tabla Producto
Route::apiResource('solicitud', SolicitudController::class);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/productos/{ProductoID}', [ProductoController::class, 'show']);
Route::delete('/productos/{ProductoID}', [ProductoController::class, 'destroy']);

// Proveedor
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::delete('/proveedores/{ProveedorID}', [ProveedorController::class, 'destroy']);
Route::put('/proveedores/{ProveedorID}', [ProveedorController::class, 'update']);

// Tabla Empleados
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::delete('/empleados/{EmpleadoID}', [EmpleadoController::class, 'destroy']);
Route::put('/empleados/{EmpleadoID}', [EmpleadoController::class, 'update']);
Route::get('/empleados/{EmpleadoID}', [EmpleadoController::class, 'show']);

// Venta
Route::post('/ventas', [VentaController::class, 'store']);
Route::get('/ventas', [VentaController::class, 'index']);
Route::delete('/ventas/{VentaID}', [VentaController::class, 'destroy']);
Route::put('/ventas/{VentaID}', [VentaController::class, 'update']);
Route::get('/ventas/{VentaID}', [VentaController::class, 'show']);


// VentaDetalle
Route::post('/ventasdetalles', [VentaDetalleController::class, 'store']);
Route::get('/ventasdetalles', [VentaDetalleController::class, 'index']);
Route::delete('/ventasdetalles/{DetalleVentaID}', [VentaDetalleController::class, 'destroy']);
Route::put('/ventasdetalles/{DetalleVentaID}', [VentaDetalleController::class, 'update']);


/*
Route::post('auth/register',[AuthController::class,'register']);
Route::post('auth/login',[AuthController::class,'register']);
*/
Route::prefix('auth')->controller(AuthController::class)->group(
    function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('/cerrar-sesion', [AuthController::class, 'logout'])->middleware('auth:sanctum');

        // Route::post('empleados','empleados');
        // api.php
        //Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    }
);

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
