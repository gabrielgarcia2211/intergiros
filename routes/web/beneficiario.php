<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\BeneficiarioController;

Route::group(['prefix' => 'beneficiario'], function () {
    Route::post('/store', [BeneficiarioController::class, 'store'])->name('beneficiario.store');
});
