<?php

use App\Http\Controllers\cidadesController;
use App\Http\Controllers\estadosController;
use App\Models\Cidades;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\CrapIndex;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//você pode usar o mesmo nome de rota se o metodo for diferente no laravel 8

//Municípios
Route::post('/cidades', [cidadesController::class, 'store'])->name('cidades.store');
Route::get('/cidades/create', [cidadesController::class, 'create'])->name('cidades.create');
Route::get('/cidades', [cidadesController::class, 'index'])->name('cidades.index');
Route::delete('/cidades/{id}', [cidadesController::class,'destroy'])->name('cidades.destroy');
Route::get('/cidades/{id}', [cidadesController::class, 'show'])->name('cidades.show');
Route::get('/cidades/edit/{id}', [cidadesController::class, 'edit'])->name('cidades.edit');
Route::put('/cidades/{id}', [cidadesController::class, 'update'])->name('cidades.update');
Route::any('/cidades/search', [cidadesController::class, 'search'])->name('cidades.search');


//Estados

Route::post('/estados', [estadosController::class, 'store'])->name('estados.store');
Route::get('/estados/create', [estadosController::class, 'create'])->name('estados.create');
Route::get('/estados', [estadosController::class, 'index'])->name('estados.index');
Route::delete('/estados/{id}', [estadosController::class,'destroy'])->name('estados.destroy');
Route::get('/estados/{id}', [estadosController::class, 'show'])->name('estados.show');
Route::get('/estados/edit/{id}', [estadosController::class, 'edit'])->name('estados.edit');
Route::put('/estados/{id}', [estadosController::class, 'update'])->name('estados.update');
Route::any('/estados/search', [estadosController::class, 'search'])->name('estados.search');
