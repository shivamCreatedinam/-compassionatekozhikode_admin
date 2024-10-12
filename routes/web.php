<?php

use App\Http\Controllers\ImageCompressController;
use App\Http\Controllers\Ngo\NgoAuthController;
use App\Http\Controllers\Ngo\NgoDashboardController;
use App\Http\Controllers\SuperAdmin\NgoRegistrationController;
use App\Http\Controllers\SuperAdmin\SuperAdminAuthController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/compress-image', [ImageCompressController::class, 'uploadForm'])->name('compressFrom');
Route::get('/view-image', [ImageCompressController::class, 'viewImage'])->name('viewImage');
Route::post('/upload-image', [ImageCompressController::class, 'uploadImage'])->name("uploadImage");
Route::get('/download-image/{fileName}', [ImageCompressController::class, 'downloadImage'])->name('download-image');

// Admin Routes Group
Route::name('sadmin.')->group(function () {

    // Admin login route
    Route::get('/', [SuperAdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [SuperAdminAuthController::class, 'login'])->name('login.submit');
    Route::get('logout', [SuperAdminAuthController::class, 'logout'])->name('logout');

    // Admin protected routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/register-ngo', [NgoRegistrationController::class, 'register'])->name('register.ngo');
    });
});



