<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\UserDashboardController;

Route::middleware('web')->group(function () {

    // If the aren't .env file, redirect to the installer
    if (!file_exists(base_path('.env'))) {
        Route::get('{any?}', fn () => redirect('/install'))->where('any', '.*');
    }

    Route::get('/', [LandingController::class, 'index'])->name('landing');

    // Installer
    Route::get('/install', [InstallController::class, 'index'])->name('install');
    Route::post('/install', [InstallController::class, 'store']);

    // Authenticated user
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/{any?}', [UserDashboardController::class, 'index'])->where('any', '.*');
    });
})
?>