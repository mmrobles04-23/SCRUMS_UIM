<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebPasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CongresoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\SeminarioController;
use App\Http\Controllers\Admin\DepartamentoController as AdminDepartamentoController;
use App\Http\Controllers\Admin\SeminarioController as AdminSeminarioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Admin\InscripcionController as AdminInscripcionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InscripcionController;

Route::get('/', [HomeController::class, 'welcome'])->name('home');

Route::get('/congreso', [CongresoController::class, 'indexPublico'])->name('congresos.index');
Route::get('/congresos/{congreso:slug}', [CongresoController::class, 'showPublico'])->name('congresos.show');

Route::get('/investigacion', [SeminarioController::class, 'index'])->name('seminarios.index');
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripciones.store');

Route::get('/departamento/{siglas}', [DepartamentoController::class, 'show'])->name('departamento.show');
Route::get('/departamento', [DepartamentoController::class, 'show'])->defaults('siglas', 'DRNA');

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
            Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

            Route::prefix('admin')->name('admin.')->group(function () {
                Route::patch('congresos/{congreso}/activo', [CongresoController::class, 'toggleActivo'])->name('congresos.toggle-activo');
                Route::resource('congresos', CongresoController::class)->except(['show']);

                Route::resource('departamentos', AdminDepartamentoController::class);
                Route::resource('seminarios', AdminSeminarioController::class);

                Route::get('welcome', [WelcomeController::class, 'edit'])->name('welcome.edit');
                Route::post('welcome', [WelcomeController::class, 'update'])->name('welcome.update');

                // Gestión de Usuarios
                Route::get('usuarios', [UserController::class, 'index'])->name('usuarios.index');
                Route::get('usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
                Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
                Route::put('usuarios/{user}/password', [UserController::class, 'changePassword'])->name('usuarios.password.update');
                Route::patch('usuarios/{user}/status', [UserController::class, 'toggleStatus'])->name('usuarios.status.toggle');

                // Gestión de Inscripciones a Seminarios
                Route::get('inscripciones', [AdminInscripcionController::class, 'index'])->name('inscripciones.index');
                Route::delete('inscripciones/{inscripcion}', [AdminInscripcionController::class, 'destroy'])->name('inscripciones.destroy');
            });
        });
    });
});
