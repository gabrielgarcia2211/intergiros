<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Formularios\FormularioController;

Route::group(['prefix' => 'formulario', /* 'middleware' => ['auth'] */], function () {
    Route::get('', [FormularioController::class, 'index'])->name('formulario');
    Route::get('/list', [FormularioController::class, 'getFormularios'])->name('formulario.list');
    Route::get('/list/user', [FormularioController::class, 'getFormulariosUser'])->name('formulario.list.user');
    Route::post('/store', [FormularioController::class, 'store'])->name('formulario.post');
    //Route::post('/update/{emplazamiento}', [FormularioController::class, 'update'])->middleware(['can:emplazamiento.edit'])->name('formulario.update');
});
