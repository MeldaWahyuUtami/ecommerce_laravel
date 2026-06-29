<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\HistoryController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', fn () => view('welcome'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('post.login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'post_register'])->name('post.register');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/product', [ProductController::class, 'index'])
        ->name('admin.product');

    Route::get('/product/create', [ProductController::class, 'create'])
        ->name('admin.product.create');

    Route::post('/product/store', [ProductController::class, 'store'])
        ->name('admin.product.store');

    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])
        ->name('admin.product.detail');

    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])
        ->name('admin.product.edit');

    Route::post('/product/update/{id}', [ProductController::class, 'update'])
        ->name('admin.product.update');

    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])
        ->name('admin.product.delete');

    /*
    |---------------------------------------
    | 🔥 FIX INI YANG HILANG SEBELUMNYA
    |---------------------------------------
    */

    Route::get('/distributor', [DistributorController::class, 'index'])
        ->name('admin.distributor');

    // ✅ TAMBAHAN PENTING (INI YANG BIKIN ERROR KAMU)
    Route::get('/distributor/create', [DistributorController::class, 'create'])
        ->name('admin.distributor.create');

    Route::post('/distributor/import', [DistributorController::class, 'import'])
        ->name('admin.distributor.import');

    Route::get('/distributor/export', [DistributorController::class, 'export'])
        ->name('admin.distributor.export');

    Route::get('/purchase', [PurchaseController::class, 'index'])
        ->name('admin.purchase');

    Route::get('/history', [HistoryController::class, 'index'])
        ->name('admin.history');

    Route::get('/history/detail/{id}', [HistoryController::class, 'detail'])
        ->name('admin.history.detail');

    Route::get('/logout', [AuthController::class, 'admin_logout'])
        ->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('auth:web')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/product', [UserController::class, 'product'])
        ->name('user.product');

    Route::get('/product/detail/{id}', [UserController::class, 'detail'])
        ->name('user.detail.product');

    Route::get('/product/purchase/{productId}', [UserController::class, 'purchase'])
        ->name('user.product.purchase');

    Route::get('/history/{id}', [UserController::class, 'history'])
        ->name('user.history');

    Route::get('/history/detail/{id}', [UserController::class, 'detail_history'])
        ->name('user.detail.history');

    Route::get('/logout', [AuthController::class, 'user_logout'])
        ->name('user.logout');
});