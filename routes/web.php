<?php

use App\Http\Controllers\ImageCompressController;
use App\Http\Controllers\Ngo\NgoAuthController;
use App\Http\Controllers\Ngo\NgoDashboardController;
use App\Http\Controllers\SuperAdmin\NgoController;
use App\Http\Controllers\SuperAdmin\NgoRegistrationController;
use App\Http\Controllers\SuperAdmin\SuperAdminAuthController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\PostController;
use App\Http\Controllers\SuperAdmin\EventController;
use App\Http\Controllers\SuperAdmin\BlogController;
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

        Route::prefix('user')->group(function(){
            Route::get('/all_users', [UserController::class, 'index'])->name('all_users');
            Route::post('/block_user/{id}', [UserController::class, 'blockUser'])->name('block_user');
            Route::get('/edit_user/{id}', [UserController::class, 'editUser'])->name('edit_user');
            Route::put('/update_user/{id}', [UserController::class, 'updateUser'])->name('update_user');
        });

        Route::prefix('post')->group(function(){
            Route::get('/post_list', [PostController::class, 'postList'])->name('post_list');
            Route::get('/add_post', [PostController::class, 'addPost'])->name('add_post');
            Route::post('/create_post', [PostController::class, 'createPost'])->name('create_post');
            Route::get('/edit_post/{id}', [PostController::class, 'editPost'])->name('edit_post');
            Route::put('/update_post/{id}', [PostController::class, 'updatePost'])->name('update_post');
            Route::delete('/delete_post/{id}', [PostController::class, 'deletePost'])->name('delete_post');
        });

        Route::prefix('blog')->group(function(){
            Route::get('/index', [BlogController::class, 'index'])->name('index');
            Route::post('/create_blog', [BlogController::class, 'createBlog'])->name('create_blog');
            Route::get('/blog_list', [BlogController::class, 'blogList'])->name('blog_list');

        });

        Route::prefix('event')->group(function(){
            Route::get('/show_event_form', [EventController::class, 'showEventForm'])->name('show_event_form');
            Route::post('/create_event', [EventController::class, 'createEvent'])->name('create_event');
            Route::get('/event-list', [EventController::class, 'eventList'])->name('event-list');
        });

        Route::prefix('ngo')->group(function () {
            Route::get('/list', [NgoController::class, 'index'])->name('ngo_list');
            Route::get('/register', [NgoController::class, 'registerForm'])->name('register_ngo');
            Route::post('/create', [NgoController::class, 'storeNGO'])->name('create_ngo');
            Route::delete('/ngo-delete/{id}', [NgoController::class, 'deleteNGO'])->name('ngo_delete');
        });
    });
});



