<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
