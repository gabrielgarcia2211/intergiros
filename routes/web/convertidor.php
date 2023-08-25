<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Convertidor\ConvertidorController;


Route::group(['prefix' => 'convertidor', 'middleware' => ['auth']], function () {
    Route::post('/form/tasa', [ConvertidorController::class, 'getTasaConvert'])->name('convertidor');
});
