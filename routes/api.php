<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SolicitudController;
use App\Http\Controllers\EjemploApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(
    function () {
        Route::apiResource('solicitud', SolicitudController::class);
        Route::apiResource('ejemploApi', EjemploApiController::class);
    }
);

Route::apiResource('solicitud', SolicitudController::class);
/*
Route::post('auth/register',[AuthController::class,'register']);
Route::post('auth/login',[AuthController::class,'register']);
*/
Route::prefix('auth')->controller(AuthController::class)->group(
    function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
    }
);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
