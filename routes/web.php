<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassesController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('auth.index');
    Route::post('/', 'login')->name('auth.login');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::middleware(['check.session'])->group(function () {
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(ClassesController::class)->group(function () {
        Route::get('/classes', 'index')->name('classes.index');
    });
});
