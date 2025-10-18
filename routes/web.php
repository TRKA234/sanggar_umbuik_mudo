<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// User Controllers
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ServiceController as UserServiceController;
use App\Http\Controllers\User\TestimoniController as UserTestimoniController;
use App\Http\Controllers\User\PesananController as UserPesananController;
use App\Http\Controllers\User\PaymentController as UserPaymentController;

/*
|--------------------------------------------------------------------------
| Landing Page (umum)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| User Routes (setelah login biasa)
|--------------------------------------------------------------------------
*/

Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', UserServiceController::class)->only(['index', 'show']);
    Route::resource('pesanan', UserPesananController::class)->except(['show']);
    Route::resource('payments', UserPaymentController::class);
    Route::resource('testimoni', UserTestimoniController::class);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class])
    ->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Modul CRUD admin
        Route::resource('services', AdminServiceController::class);
        Route::resource('news', NewsController::class);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::resource('payments', \App\Http\Controllers\Admin\PaymentController::class);
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
        Route::resource('certificates', \App\Http\Controllers\Admin\CertificateController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

        // Laporan
        Route::get('reports', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('reports/export', [\App\Http\Controllers\Admin\ReportController::class, 'exportCsv'])->name('reports.export');
        Route::get('reports/pdf', [\App\Http\Controllers\Admin\ReportController::class, 'exportPdf'])->name('reports.pdf');

        // Upload untuk berita (CKEditor)
        Route::post('/news/upload', [NewsController::class, 'uploadImage'])->name('news.upload');
    });
