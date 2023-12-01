<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\SitesController;

Route::get('/', [SitesController::class, 'home'])->name('home');
Route::get('/login', [SitesController::class, 'login'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registro', [SitesController::class, 'registro'])->name('registro');

// Rutas para controlar vistas
Route::group(['prefix' => 'sites', 'middleware' => 'auth'], function () {
    Route::get('/welcome', [SitesController::class, 'index'])->name('site.welcome');
    Route::get('/bolivaresPeruVen', [SitesController::class, 'index_bolivares_peru_ven'])->name('site.bolivaresPeruVen');
    //Route::get('/camPayPeru', [SitesController::class, 'index_cam_pay_peru'])->name('site.camPayPeru');
    Route::get('/verificarPaypal', [SitesController::class, 'index_verificar_paypal'])->name('site.verificarPaypal');
    Route::get('/otrosServicios', [SitesController::class, 'index_otros_servicios'])->name('site.otrosServicios');
    Route::get('/bolivaresColVen', [SitesController::class, 'index_bolivares_col_ven'])->name('site.bolivaresColVen');
    Route::get('/contacto', [SitesController::class, 'index_contacto'])->name('site.contacto');
    Route::get('/politicas', [SitesController::class, 'index_politicas'])->name('site.politicas');
});
