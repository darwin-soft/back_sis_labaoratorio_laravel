<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UsuariorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "/v1/auth"], function () {
    Route::post("/login", [AuthController::class, "login"]);
    Route::post("/registro", [AuthController::class, "registrar"]);

    Route::group(["middleware" => "auth:sanctum"], function () {
        Route::get("/perfil", [AuthController::class, "perfil"]);
        Route::post("/logout", [AuthController::class, "salir"]);
    });
});


Route::group(["middleware" => "auth:sanctum"], function () {

    // asignar cuenta de usuario a persona
    Route::post("/persona/{id}/asignar-cuenta", [PersonaController::class, "asignarCuentaUsuario"]);
    //rutas seguras
    Route::apiResource("/usuario", UsuariorController::class);
    Route::apiResource("/persona", PersonaController::class);
});
