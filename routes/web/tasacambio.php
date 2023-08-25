<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tipos\TasaCambioController;


Route::group(['prefix' => 'tasacambio', 'middleware' => ['auth']], function () {
    Route::post('/update/{tasa_cambio}', [TasaCambioController::class, 'update'])->name('tasacambio.update');
    Route::get('/list', [TasaCambioController::class, 'getTasas'])->name('tasacambio.list');
});
