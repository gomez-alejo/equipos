<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/partidos', function () {
    return view('partidos');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('Roles.admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/referee/dashboard', function () {
        return view('Roles.refere.dashboard');
    })->name('referee.dashboard');

    Route::get('/fan/dashboard', function () {
        return view('Roles.fan.dashboard');
    })->name('fan.dashboard');
});


// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    
    // Dashboard principal del administrador
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/tabla-posiciones', [AdminController::class, 'tablaPosiciones'])->name('admin.tabla-posiciones');

    // Gestión de equipos
    Route::prefix('admin/equipos')->name('admin.equipos.')->group(function () {
        Route::get('/', [EquipoController::class, 'index'])->name('index');
        Route::get('/create', [EquipoController::class, 'create'])->name('create');
        Route::post('/', [EquipoController::class, 'store'])->name('store');
        Route::get('/{equipo}', [EquipoController::class, 'show'])->name('show');
        Route::get('/{equipo}/edit', [EquipoController::class, 'edit'])->name('edit');
        Route::put('/{equipo}', [EquipoController::class, 'update'])->name('update');
        Route::delete('/{equipo}', [EquipoController::class, 'destroy'])->name('destroy');
    });

    // Gestión de jugadores
    Route::prefix('admin/jugadores')->name('admin.jugadores.')->group(function () {
        Route::get('/', [JugadorController::class, 'index'])->name('index');
        Route::get('/create', [JugadorController::class, 'create'])->name('create');
        Route::post('/', [JugadorController::class, 'store'])->name('store');
        Route::get('/{jugador}', [JugadorController::class, 'show'])->name('show');
        Route::get('/{jugador}/edit', [JugadorController::class, 'edit'])->name('edit');
        Route::put('/{jugador}', [JugadorController::class, 'update'])->name('update');
        Route::delete('/{jugador}', [JugadorController::class, 'destroy'])->name('destroy');
    });

    // Gestión de partidos
    Route::prefix('admin/partidos')->name('admin.partidos.')->group(function () {
        Route::get('/', [PartidoController::class, 'index'])->name('index');
        Route::get('/create', [PartidoController::class, 'create'])->name('create');
        Route::post('/', [PartidoController::class, 'store'])->name('store');
        Route::get('/{partido}', [PartidoController::class, 'show'])->name('show');
        Route::get('/{partido}/edit', [PartidoController::class, 'edit'])->name('edit');
        Route::put('/{partido}', [PartidoController::class, 'update'])->name('update');
        Route::delete('/{partido}', [PartidoController::class, 'destroy'])->name('destroy');
        
        // Gestión de resultados
        Route::get('/{partido}/resultado', [PartidoController::class, 'gestionarResultado'])->name('resultado');
        Route::post('/{partido}/goles', [PartidoController::class, 'agregarGol'])->name('agregar-gol');
        Route::delete('/goles/{gol}', [PartidoController::class, 'eliminarGol'])->name('eliminar-gol');
        Route::post('/{partido}/tarjetas', [PartidoController::class, 'agregarTarjeta'])->name('agregar-tarjeta');
        Route::delete('/tarjetas/{tarjeta}', [PartidoController::class, 'eliminarTarjeta'])->name('eliminar-tarjeta');
    });
});