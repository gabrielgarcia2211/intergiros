<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SitesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas para controlar vistas
Route::group(['prefix' => 'sites', /* 'middleware' => 'auth' */], function () {
    Route::get('/welcome', [SitesController::class, 'index'])->name('site.welcome');
    Route::get('/bolivaresPeruVen', [SitesController::class, 'index_bolivares_peru_ven'])->name('site.bolivaresPeruVen');
    Route::get('/camPayPeru', [SitesController::class, 'index_cam_pay_peru'])->name('site.camPayPeru');
    Route::get('/verificarPaypal', [SitesController::class, 'index_verificar_paypal'])->name('site.verificarPaypal');
    Route::get('/otrosServicios', [SitesController::class, 'index_otros_servicios'])->name('site.otrosServicios');
    Route::get('/bolivaresColVen', [SitesController::class, 'index_bolivares_col_ven'])->name('site.bolivaresColVen');
    Route::get('/contacto', [SitesController::class, 'index_contacto'])->name('site.contacto');
    Route::get('/politicas', [SitesController::class, 'index_politicas'])->name('site.politicas');
});
