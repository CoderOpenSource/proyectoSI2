<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\AuthController;
use Laravel\Passport\Passport;
use App\Http\Controllers\ActivoFijoController;
use App\Http\Controllers\CategoriaController;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('privilegios', PrivilegioController::class);
Route::apiResource('bitacoras', BitacoraController::class);
Route::apiResource('responsables', ResponsableController::class);
//login y logout

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('activos-fijos', ActivoFijoController::class);
Route::apiResource('categorias', CategoriaController::class);
