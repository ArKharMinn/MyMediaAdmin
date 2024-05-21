<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ActionLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::redirect('/', 'login');
Route::get('logout', [ProfileController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::get('profile', [ProfileController::class, 'profile'])->name('dashboard#profile');
        Route::get('password', [ProfileController::class, 'password'])->name('dashboard#password');
        Route::post('change', [ProfileController::class, 'change'])->name('dashboard#change');
        Route::post('update', [ProfileController::class, 'update'])->name('dashboard#update');
    });
    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('category#list');
        Route::post('createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
        Route::get('delete', [CategoryController::class, 'delete'])->name('category#delete');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
        Route::post('editPage/{id}', [CategoryController::class, 'editPage'])->name('category#editPage');
    });
    Route::prefix('admin')->group(function () {
        Route::get('list', [AdminController::class, 'list'])->name('admin#list');
        Route::get('delete', [AdminController::class, 'delete'])->name('admin#delete');
    });
    Route::prefix('user')->group(function () {
        Route::get('list', [UserController::class, 'list'])->name('user#list');
        Route::get('delete', [UserController::class, 'delete'])->name('user#delete');
    });
    Route::prefix('post')->group(function () {
        Route::get('list', [PostController::class, 'list'])->name('post#list');
        Route::post('create', [PostController::class, 'create'])->name('post#create');
        Route::get('delete', [PostController::class, 'delete'])->name('post#delete');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('post#edit');
        Route::post('update/{id}', [PostController::class, 'update'])->name('post#update');
        Route::get('view/{id}', [PostController::class, 'view'])->name('post#view');
    });
    Route::prefix('trend')->group(function () {
        Route::get('list', [TrendPostController::class, 'list'])->name('trend#list');
        Route::get('detail/{id}', [TrendPostController::class, 'detail'])->name('tread#detail');
    });
});
