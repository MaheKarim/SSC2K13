<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhoneNumberController;
use App\Http\Controllers\Admin\JerseySizeController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\LoginHistoryController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [DonationController::class, 'index'])->name('home');
Route::post('/donate', [DonationController::class, 'submit'])->name('donation.submit');
Route::get('/donation/success/{hash}', [DonationController::class, 'success'])->name('donation.success');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes - not using guest middleware to allow custom redirect for logged-in users
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Protected admin routes
    Route::middleware(['auth.admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Registrations
        Route::get('/registrations', [AdminDonationController::class, 'index'])->name('registrations.index');
        Route::get('/registrations/create', [AdminDonationController::class, 'createManual'])->name('registrations.create');
        Route::post('/registrations', [AdminDonationController::class, 'storeManual'])->name('registrations.store');
        Route::get('/registrations/{donation}', [AdminDonationController::class, 'show'])->name('registrations.show');
        Route::post('/registrations/{donation}/verify', [AdminDonationController::class, 'verify'])->name('registrations.verify');
        Route::post('/registrations/{donation}/transfer', [AdminDonationController::class, 'markTransferred'])->name('registrations.transfer');
        Route::get('/registrations/export', [AdminDonationController::class, 'export'])->name('registrations.export');

        // Phone Numbers
        Route::get('/phone-numbers', [PhoneNumberController::class, 'index'])->name('phone-numbers.index');
        Route::post('/phone-numbers', [PhoneNumberController::class, 'store'])->name('phone-numbers.store');
        Route::put('/phone-numbers/{phoneNumber}', [PhoneNumberController::class, 'update'])->name('phone-numbers.update');
        Route::delete('/phone-numbers/{phoneNumber}', [PhoneNumberController::class, 'destroy'])->name('phone-numbers.destroy');
        Route::post('/phone-numbers/{phoneNumber}/toggle', [PhoneNumberController::class, 'toggleActive'])->name('phone-numbers.toggle');

        // Jersey Sizes
        Route::get('/jersey-sizes', [JerseySizeController::class, 'index'])->name('jersey-sizes.index');
        Route::post('/jersey-sizes', [JerseySizeController::class, 'store'])->name('jersey-sizes.store');
        Route::put('/jersey-sizes/{jerseySize}', [JerseySizeController::class, 'update'])->name('jersey-sizes.update');
        Route::delete('/jersey-sizes/{jerseySize}', [JerseySizeController::class, 'destroy'])->name('jersey-sizes.destroy');
        Route::post('/jersey-sizes/{jerseySize}/toggle', [JerseySizeController::class, 'toggleActive'])->name('jersey-sizes.toggle');

        // Site Settings
        Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
        Route::put('/site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

        // Login History
        Route::get('/login-history', [LoginHistoryController::class, 'index'])->name('login-history.index');

        // Activity Log
        Route::get('/activity-log', [LoginHistoryController::class, 'activityLog'])->name('activity-log.index');
    });
});
