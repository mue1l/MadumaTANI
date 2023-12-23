<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EdukasiController;
use App\Http\Controllers\Web\BarangController;
use App\Http\Controllers\Web\PinjamController;
use App\Http\Controllers\Web\ProyekTaniController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain' => ''], function() {
    Route::get('/',[AuthController::class, 'login'])->name('auth.index');
    Route::get('auth/register',[AuthController::class, 'register'])->name('auth.register');
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
        Route::post('forgot',[AuthController::class, 'do_forgot'])->name('forgot');
        Route::get('reset/{token}',[AuthController::class, 'reset'])->name('getreset');
        Route::post('reset',[AuthController::class, 'do_reset'])->name('reset');
    });
    Route::post('/logout',[AuthController::class,'do_logout'])->name('logout');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/pengurus',[DashboardController::class,'pengurus'])->name('pengurus');
    Route::get('/contact',[DashboardController::class,'contact'])->name('contact');
    Route::get('/proyek',[DashboardController::class,'proyektani'])->name('proyektani');
    Route::get('/denda',[DashboardController::class,'denda'])->name('denda');
    Route::get('/parit',[DashboardController::class,'parit'])->name('parit');
    Route::resource('edukasi', EdukasiController::class);
    Route::resource('proyekTani', ProyekTaniController::class);
    Route::resource('barang', BarangController::class);
    Route::patch('pinjam/{pinjam}/terima',[PinjamController::class,'terima'])->name('pinjam.terima');
    Route::patch('pinjam/{pinjam}/tolak',[PinjamController::class,'tolak'])->name('pinjam.tolak');
    Route::patch('pinjam/{pinjam}/denda',[PinjamController::class,'denda'])->name('pinjam.denda');
    Route::prefix('pinjam/')->name('pinjam.')->group(function(){
        Route::get('',  [PinjamController::class, 'index'])->name('index');
        Route::get('show/{id}',[PinjamController::class, 'show'])->name('show');
        Route::post('store',[PinjamController::class, 'store'])->name('store');
    });
});
