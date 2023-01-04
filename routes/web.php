<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\BulanController;

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

    // BULAN ROUTE
    Route::get('/bulan/daftar-bulan', [BulanController::class, 'daftar_bulan'])->name('daftar-bulan');

    // AGENDA ROUTE
    Route::get('/agenda/daftar-agenda', [AgendaController::class, 'daftar_agenda'])->name('daftar-agenda');
    Route::post('/agenda/tambah-agenda', [AgendaController::class, 'tambah_agenda'])->name('tambah-agenda');
    Route::post('/agenda/ubah-agenda/{id}', [AgendaController::class, 'ubah_agenda'])->name('ubah-agenda');
    Route::post('/agenda/hapus-agenda/{id}', [AgendaController::class, 'hapus_agenda'])->name('hapus-agenda');

    // INFORMASI ROUTE
    Route::get('/informasi/daftar-informasi', [InformasiController::class, 'daftar_informasi'])->name('daftar-informasi');
    Route::post('/informasi/tambah-informasi', [InformasiController::class, 'tambah_informasi'])->name('tambah-informasi');
    Route::post('/informasi/ubah-informasi/{id}', [InformasiController::class, 'ubah_informasi'])->name('ubah-informasi');
    Route::post('/informasi/hapus-informasi/{id}', [InformasiController::class, 'hapus_informasi'])->name('hapus-informasi');

    // AKUN ROUTE
    Route::get('/akun/daftar-akun', [BackController::class, 'daftar_akun'])->name('daftar-akun');

});

Route::group(['prefix' => '/client', 'middleware' => 'ceklogin'], function () {
    // CLIENT ROUTE
    Route::get('/', [ClientController::class, 'index'])->name('client');
    Route::get('/client-profile', [ClientController::class, 'client_profile'])->name('client-profile');
    Route::post('/client-ubah-foto', [ClientController::class, 'client_ubah_foto'])->name('client-ubah-foto');

    // DAFTAR AGENDA
    Route::get('/client-daftar-agenda', [ClientController::class, 'client_daftar_agenda'])->name('client-daftar-agenda');
    Route::get('/client-lihat-agenda/{id}', [ClientController::class, 'client_lihat_agenda'])->name('client-lihat-agenda');

    // DAFTAR INFORMASI
    Route::get('/client-daftar-informasi', [ClientController::class, 'client_daftar_informasi'])->name('client-daftar-informasi');

    // KATEGORI AGENDA
    Route::get('/client-kategori-agenda', [ClientController::class, 'client_kategori_agenda'])->name('client-kategori-agenda');
    Route::get('/client-daftar-agenda-kategori/{id}', [ClientController::class, 'client_daftar_agenda_kategori'])->name('client-daftar-agenda-kategori');

});

// GENERATE ROUTE
Route::get('/generate-pengguna', [GenerateController::class, 'generate_pengguna'])->name('generate-pengguna');
Route::get('/generate-default-pengguna', [GenerateController::class, 'generate_default_pengguna'])->name('generate-default-pengguna');
Route::get('/generate-agenda', [GenerateController::class, 'generate_agenda'])->name('generate-agenda');
Route::get('/generate-informasi', [GenerateController::class, 'generate_informasi'])->name('generate-informasi');
Route::get('/generate-all', [GenerateController::class, 'generate_all'])->name('generate-all');
