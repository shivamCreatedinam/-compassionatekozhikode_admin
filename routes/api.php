<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NgoApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\BlogApiController;


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

Route::get('/post_list', [PostApiController::class, 'postList'])->name('post_list');
Route::get('/event_list', [EventApiController::class, 'eventList'])->name('event_list');
Route::get('/upcoming_event', [EventApiController::class, 'upcomingEvent'])->name('upcoming_event');
Route::get('/past_event', [EventApiController::class, 'pastEvent'])->name('past_event');
Route::get('/blogs', [BlogApiController::class, 'blogs'])->name('blogs');

Route::middleware('auth:sanctum')->group(function() {
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
    Route::get('/logout', [AuthApiController::class,'logout'])->name('logout');
    Route::get('/list', [NgoApiController::class, 'index'])->name('ngo_list');
    Route::post('/create', [NgoApiController::class, 'storeNGO'])->name('create_ngo');
    Route::get('/ngo-delete/{id}', [NgoApiController::class, 'deleteNGO'])->name('ngo_delete');


});

