<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SolicitudController;
use App\Http\Controllers\EjemploApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpleadoController;




Route::middleware('auth:sanctum')->group(
    function () {
        Route::apiResource('solicitud', SolicitudController::class);
        Route::apiResource('ejemploApi', EjemploApiController::class);
        //Route::get('/empleados', [EmpleadoController::class, 'index']);
    }
);

Route::apiResource('solicitud', SolicitudController::class);


// Tabla Empleados
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::delete('/empleados/{EmpleadoID}', [EmpleadoController::class, 'destroy']);
Route::put('/empleados/{EmpleadoID}', [EmpleadoController::class, 'update']);


//Tabla Producto
Route::post('/producto', [EmpleadoController::class, 'store']);
Route::get('/producto', [EmpleadoController::class, 'index']);
Route::delete('/producto/{EmpleadoID}', [EmpleadoController::class, 'destroy']);
Route::put('/producto/{EmpleadoID}', [EmpleadoController::class, 'update']);


Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::delete('/empleados/{EmpleadoID}', [EmpleadoController::class, 'destroy']);
Route::put('/empleados/{EmpleadoID}', [EmpleadoController::class, 'update']);

/*
Route::post('auth/register',[AuthController::class,'register']);
Route::post('auth/login',[AuthController::class,'register']);
*/
Route::prefix ('auth')->controller(AuthController::class)->group(
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
