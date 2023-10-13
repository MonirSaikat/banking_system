<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawlController;
use Illuminate\Support\Facades\Route;

Route::resource('login', AuthController::class)
    ->only(['index', 'store'])
    ->middleware('guest');

Route::get('/', DashboardController::class)->name('dashboard');
Route::resource('users', UserController::class)->only(['create', 'store']);
Route::resource('deposit', DepositController::class)->only(['index', 'create', 'store']);
Route::resource('withdrawal', WithdrawlController::class)->only(['index', 'create', 'store']);
