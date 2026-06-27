<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'post_register'])->name('post.register');

/*
|--------------------------------------------------------------------------
| SATU LOGIN UNTUK USER & ADMIN
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login'])->name('post.login');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/product', [ProductController::class, 'index'])
        ->name('admin.product');

    Route::get('/admin/logout', [AuthController::class, 'admin_logout'])
        ->name('admin.logout');

});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::middleware('auth:web')->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/user/product', [UserController::class, 'product'])
        ->name('user.product');

    Route::get('/user/logout', [AuthController::class, 'user_logout'])
        ->name('user.logout');

});