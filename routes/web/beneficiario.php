<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\BeneficiarioController;

Route::group(['prefix' => 'beneficiario'], function () {
    Route::post('/store', [BeneficiarioController::class, 'store'])->name('beneficiario.store');
    Route::get('/show/{id}', [BeneficiarioController::class, 'show'])->name('beneficiario.show');
    Route::get('/get', [BeneficiarioController::class, 'getBenficiario'])->name('beneficiario.get');
    Route::get('/destroy/{beneficiario}', [BeneficiarioController::class, 'destroy'])->name('beneficiario.destroy');
});
