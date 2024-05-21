<?php

use App\Http\Controllers\Api\ActionLogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\PostController as ControllersPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);

Route::post('user/register',[AuthController::class,'register']);

Route::get('category',[AuthController::class,'category'])->middleware('auth:sanctum');
Route::post('category/search',[CategoryController::class,'search']);
Route::get('category',[CategoryController::class,'category']);
Route::get('post',[PostController::class,'post']);
Route::post('detail',[PostController::class,'detail']);
Route::post('search',[PostController::class,'search']);
Route::post('actionLog',[ActionLogController::class,'actionLog']);

