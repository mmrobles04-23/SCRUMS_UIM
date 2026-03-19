<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebPasswordResetController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->group(function () {
    Route::get('/login', [WebAuthController::class, 'showLogin'])->name('web.login');
    Route::post('/login', [WebAuthController::class, 'login'])->name('web.login.submit');

    Route::get('/register', [WebAuthController::class, 'showRegister'])->name('web.register');
    Route::post('/register', [WebAuthController::class, 'register'])->name('web.register.submit');

    Route::get('/forgot-password', [WebPasswordResetController::class, 'showForgot'])->name('web.forgot.form');
    Route::post('/forgot-password', [WebPasswordResetController::class, 'sendResetCode'])->name('web.forgot.submit');

    Route::get('/reset-password', [WebPasswordResetController::class, 'showReset'])->name('web.reset.form');
    Route::post('/reset-password', [WebPasswordResetController::class, 'resetPassword'])->name('web.reset.submit');

    Route::post('/logout', [WebAuthController::class, 'logout'])->name('web.logout');

    Route::middleware('auth.token')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('web.dashboard');

        Route::middleware('admin.or.dev')->group(function () {
            Route::get('/admin/dashboard', function () {
                return view('admin.dashboard');
            })->name('admin.dashboard');
        });
    });
});
