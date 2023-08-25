<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tipos\EstadoController;


Route::group(['prefix' => 'estado', 'middleware' => ['auth']], function () {
    Route::get('/list', [EstadoController::class, 'getEstados'])->name('estado.list');
});
