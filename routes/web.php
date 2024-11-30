<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('admin')->group(function () {
    // Show login form
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

    // Handle login
    Route::post('/login', [AdminAuthController::class, 'login']);

    // Protected routes (only accessible to logged-in admins)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('Backend/dashboard/index'); // Replace with your actual admin dashboard view
        })->name('admin.dashboard');

        // Logout route
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});
