<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GalleryController;



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

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]) // pakai class langsung
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


        // Services admin controller
        Route::resource('services', AdminServiceController::class);
        // resources untuk modul lain (belum dibuat) - contoh:
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('galleries', GalleryController::class);
        });


        // resource routes (skeleton)


        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::resource('payments', \App\Http\Controllers\Admin\PaymentController::class);
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
        Route::resource('certificates', \App\Http\Controllers\Admin\CertificateController::class);
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        // Simple reports page (uses dummy data until orders module is ready)
        Route::get('reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('reports/export', [\App\Http\Controllers\Admin\ReportController::class, 'exportCsv'])->name('reports.export');
        Route::get('reports/pdf', [\App\Http\Controllers\Admin\ReportController::class, 'exportPdf'])->name('reports.pdf');
    });

Route::post('/admin/news/upload', [NewsController::class, 'uploadImage'])
    ->name('admin.news.upload');
