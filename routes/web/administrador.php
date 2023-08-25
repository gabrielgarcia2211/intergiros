<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin');
    Route::get('/tasas', function () {
        return view('admin.tasa');
    })->name('admin.tasas');
});
