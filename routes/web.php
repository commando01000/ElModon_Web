<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EngineersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/settings', [AdminController::class, 'showSettings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.update.settings');
});

Route::middleware('auth')->get('admin/settings', [AdminController::class, 'showSettingsForm'])->name('admin.settings');


// Route::middleware('auth')->group(function () {
//     Route::get('admin/settings', [AdminController::class, 'showSettingsForm'])->name('admin.settings');
//     Route::post('admin/settings', [AdminController::class, 'updateSettings'])->name('admin.update.settings');

// });


Route::prefix('admin')->group(function () {

    Route::get('admin/settings', [AdminController::class, 'showSettingsForm'])->name('admin.settings');
    Route::post('admin/settings', [AdminController::class, 'updateSettings'])->name('admin.update.settings');

    // Show login form
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

    // Handle login
    Route::post('/login', [AdminAuthController::class, 'login']);

    // Protected routes (only accessible to logged-in admins)
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('Backend.dashboard.index'); // Corrected path
        })->name('admin.dashboard');

        // Logout route
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
    // Route to show the change password and email form
    Route::get('settings', [AdminController::class, 'showSettingsForm'])->name('admin.settings');

    // Route to handle the form submission
    Route::post('settings', [AdminController::class, 'updateSettings'])->name('admin.update.settings');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('about-us', [AboutController::class, 'index'])->name('about-us');
Route::get('engineers', [EngineersController::class, 'index'])->name('engineers');
Route::get('projects', [ProjectsController::class, 'index'])->name('projects');
// Lang routes
Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    Session::put('locale', $locale);
    return redirect()->back();
})->name('lang');
