<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;

Route::group(['prefix' => 'users'], function () {
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/get', [UserController::class, 'getUser'])->name('users.get');
});
