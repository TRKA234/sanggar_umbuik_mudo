<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;

// Landing Page (bisa diakses siapa saja)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pesan', [PesananController::class, 'create'])->name('pesan.form')->middleware('auth');

// Testimoni (hanya bisa setelah login)
Route::middleware('auth')->group(function () {
    Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create');
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
});
