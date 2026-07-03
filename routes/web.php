<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/movies', [MovieController::class, 'index'])->name('movies');

Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

Route::get('/about', [AboutController::class, 'index'])->name('about');