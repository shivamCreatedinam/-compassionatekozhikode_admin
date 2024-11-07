<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthApiController::class, 'register'])->name('register');
Route::post('/login', [AuthApiController::class, 'login'])->name('login');
Route::get('/logout', [AuthApiController::class,'logout'])->name('logout');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    // Route::get('/dashboard', [SuperAdminApiDashboardController::class, 'index'])->name('dashboard');
    Route::get('/list', [NgoApiController::class, 'index'])->name('ngo_list');
    Route::post('/create', [NgoApiController::class, 'storeNGO'])->name('create_ngo');
    Route::delete('/ngo-delete/{id}', [NgoApiController::class, 'deleteNGO'])->name('ngo_delete');



});
