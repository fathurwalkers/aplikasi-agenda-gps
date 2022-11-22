<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
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

});
