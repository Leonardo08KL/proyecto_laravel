<?php

use App\Http\Controllers\Api\SolicitudController;
use App\Http\Controllers\EjemploApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('solicitud', SolicitudController::class);
Route::apiResource('ejemploApi', EjemploApiController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
