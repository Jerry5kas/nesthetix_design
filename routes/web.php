<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Guest Routes (Authentication)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Registration
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Theme Settings
        Route::get('/theme', [ThemeController::class, 'index'])
            ->name('theme');
        Route::put('/theme', [ThemeController::class, 'update'])
            ->name('theme.update');
        Route::get('/theme/reset', [ThemeController::class, 'reset'])
            ->name('theme.reset');

        // Users
        Route::get('/users', [UserController::class, 'index'])
            ->name('users');
    });
});
