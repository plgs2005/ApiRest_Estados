<?php

use App\Http\Controllers\cidadesController;
use App\Http\Controllers\estadosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('estados', estadosController::class);
Route::apiResource('cidades', cidadesController::class);
