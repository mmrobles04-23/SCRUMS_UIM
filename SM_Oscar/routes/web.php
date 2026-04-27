<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebPasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CongresoController;

Route::get('/', [HomeController::class, 'welcome'])->name('home');

Route::get('/congreso', [CongresoController::class, 'indexPublico'])->name('congresos.index');
Route::get('/congresos/{congreso:slug}', [CongresoController::class, 'showPublico'])->name('congresos.show');

Route::get('/investigacion', function () {
    return view('investigacion');
});

Route::get('/departamento', function () {
    return view('departamento');
});

Route::get('/boceto', function () {
    $congresos = App\Models\Congreso::activos()
        ->orderByDesc('fecha_inicio')
        ->get();
    return view('boceto', compact('congresos'));
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

            Route::prefix('admin')->name('admin.')->group(function () {
                Route::patch('congresos/{congreso}/activo', [CongresoController::class, 'toggleActivo'])->name('congresos.toggle-activo');
                Route::resource('congresos', CongresoController::class)->except(['show']);

                Route::get('departamentos', function () {
                    return view('admin.departamentos.index');
                })->name('departamentos.index');

                Route::get('seminarios', function () {
                    return view('admin.seminarios.index');
                })->name('seminarios.index');

                Route::get('welcome', function () {
                    return view('admin.welcome.edit');
                })->name('welcome.edit');
            });
        });
    });
});
