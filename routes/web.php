<?php

use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public Pages
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{blog:slug}', [PageController::class, 'blogDetail'])->name('blog.detail');

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

        // Assets
        Route::resource('assets', AssetController::class);
        Route::post('/assets/{asset}/toggle-active', [AssetController::class, 'toggleActive'])
            ->name('assets.toggle-active');
        Route::get('/assets/type/{type}', [AssetController::class, 'getByType'])
            ->name('assets.by-type');

        // Blogs
        Route::resource('blogs', BlogController::class);
    });
});
