<?php

use App\Http\Controllers\api\CidadesController;
use App\Http\Controllers\api\EstadosController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cidades', CidadesController::class);
Route::apiResource('estados', EstadosController::class);
