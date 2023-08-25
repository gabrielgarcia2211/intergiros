<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Formularios\FormularioController;


Route::middleware(['auth'])->prefix('formulario')->group(function () {

    Route::middleware('role:cliente')->group(function () {
        Route::get('', [FormularioController::class, 'index'])->name('formulario');
        Route::get('/list/user', [FormularioController::class, 'getFormulariosUser'])->name('formulario.list.user');
        Route::post('/store', [FormularioController::class, 'store'])->name('formulario.post');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/status', [FormularioController::class, 'getCantForms'])->name('formulario.status');
        Route::post('/list', [FormularioController::class, 'getFormularios'])->name('formulario.list');
        Route::post('/update/{formulario}', [FormularioController::class, 'update'])->name('formulario.update');
    });
});
