<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SanctumWebAuth;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Http\Middleware\ControlRole;



Route::get('/web-protected-route', function () {
    return response()->json(['message' => 'Bu rota Sanctum token ile korundu!']);
})->middleware(SanctumWebAuth::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('emre',function(){
    return view('emre');
});

Route::get('home', function () {
    return view('HomePage.home');
})->name('home');

//LOGİN İŞLEMLERİ
Route::post('login', [AuthController::class, 'webLogin'])->name('web.login');

Route::post('logout', [AuthController::class, 'webLogout'])->name('web.logout');
//LOGİN İŞLEMLERİ





Route::get('post/{post}',function(){
    if (auth()->check()) {
        if (auth()->user()->role == 'admin') {
            return view('Post.EachPost.Posts');
        } else {
            return view('Post.EachPost.PostUser');
        }
    } else {
        return view('Post.EachPost.PostUser');
    }
});

Route::get('create',function(){
    return view('Post.CreatePost.CreatePost');
})->middleware('auth')->name('create');  //->middleware('auth:sanctum')

Route::get('category',function(){
    return view('CategoryPage.Category');
});

Route::get('category/{id}',function(){
    return view('CategoryPage.Category');
})->name('category');


Route::get('about',function(){
    return view('AboutPage.AboutPage');
})->name('AboutPage');

Route::get('about',function(){
    return view('AboutPage.AboutPage');
})->name('AboutPage');



Route::get('login',function(){
    return view('Login.Login');
})->name('login');



Route::get('dashboard', function(){
    return view('Dashboard.dashboard');
})->name('dashboard');
//Login 


Route::get('information', function(){
    return view('Info.Info');
})->name('info');
Route::put('information',[UserController::class,'change_password'])->name('change_password');

Route::get('myPosts', function(){
    return view('UserPosts.UserPost');
})->name('myPosts');






// Admin Side

// admin middlewaresi ->middleware(ControlRole::class)/*
//Route::get('admin', function(){    return view('Admin.AdminDashboard'); })->middleware(ControlRole::class);




Route::get('developer', [AdminController::class,'dashboard'])->middleware(ControlRole::class)->name('developer');

Route::get('unconfirm', function(){
    return view('Admin.UnConfirm');
})->middleware(ControlRole::class)->name('unConfirm');

Route::get('update/{post}',function(){
    return view('Admin.UpdatePost');
});




