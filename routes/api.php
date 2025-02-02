<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//->middleware('auth:sanctum')
// CRUD BEGIN
Route::get('home',[PostController::class,'index']);

Route::post('post123',[PostController::class,'store'])->middleware('auth:sanctum');

Route::put('update/{post}',[PostController::class,'update']);

Route::delete('delete/{post}',[PostController::class,'destroy']);

// END CRUD 

// Post page foreach post
Route::get('post/{post}',[PostController::class,'edit']);

Route::get('update/{post}',[PostController::class,'post_update']);


//
Route::get('category/{category}',[PostController::class,'categories']); 

Route::post('login',[AuthController::class,'login'])->name('giris');

Route::post('register',[AuthController::class,'register'])->name('register');

Route::post('logout',[AuthController::class,'logout'])->name('logout')->middleware('auth:sanctum');

Route::get('myPosts',[PostController::class,'user_posts'])->middleware('auth:sanctum');

Route::get('unconfirm',[PostController::class,'unconfirm']);