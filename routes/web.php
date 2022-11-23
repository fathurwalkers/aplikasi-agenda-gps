<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GenerateController;

Route::get('/', function () {
    return redirect('/login-admin');
});

Route::get('/login', [BackController::class, 'login_client'])->name('login-client');
Route::get('/login-admin', [BackController::class, 'login_admin'])->name('login-admin');

Route::post('/proses-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {

    // DASHBOARD ROUTE
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // AGENDA ROUTE
    Route::get('/agenda/daftar-agenda', [AgendaController::class, 'daftar_agenda'])->name('daftar-agenda');

    // AKUN ROUTE
    Route::get('/akun/daftar-akun', [BackController::class, 'daftar_akun'])->name('daftar-akun');

});

Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    // CLIENT ROUTE
    Route::get('/', [ClientController::class, 'index'])->name('client');
    Route::get('/client-profile', [ClientController::class, 'client_profile'])->name('client-profile');
    Route::post('/client-ubah-foto', [ClientController::class, 'client_ubah_foto'])->name('client-ubah-foto');

});

// GENERATE ROUTE
Route::get('/generate-pengguna', [GenerateController::class, 'generate_pengguna'])->name('generate-pengguna');
Route::get('/generate-default-pengguna', [GenerateController::class, 'generate_default_pengguna'])->name('generate-default-pengguna');
Route::get('/generate-agenda', [GenerateController::class, 'generate_agenda'])->name('generate-agenda');
Route::get('/generate-all', [GenerateController::class, 'generate_all'])->name('generate-all');
