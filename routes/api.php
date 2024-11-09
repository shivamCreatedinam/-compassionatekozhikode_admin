<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NgoApiController;
use App\Http\Controllers\Api\AuthApiController;
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


Route::post('/login', [AuthApiController::class, 'login'])->name('login');
Route::post('/register', [AuthApiController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function() {
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
    Route::get('/logout', [AuthApiController::class,'logout'])->name('logout');
    Route::get('/list', [NgoApiController::class, 'index'])->name('ngo_list');
    Route::post('/create', [NgoApiController::class, 'storeNGO'])->name('create_ngo');
    Route::get('/ngo-delete/{id}', [NgoApiController::class, 'deleteNGO'])->name('ngo_delete');


});

