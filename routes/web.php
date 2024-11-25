<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;
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
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Route::get('/', function () {
    return view('welcome');
});

/** Laravel Socialite */
Route::get('chinh-sach-rieng-tu', function () {
    return '<h1>Chính sách riêng tư</h1>';
});

Route::get('huong-dan-xoa-du-lieu', function () {
        return '<h1>Hướng dẫn xoá dữ liệu</h1>';
});

Route::get('auth/facebook/callback', [LoginController::class,'facebookCallback']);

Route::get('auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('auth.facebook');

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/google/callback',[LoginController::class,'googleCallback']);
 
Route::get('auth/github', function () {
     return Socialite::driver('github')->redirect();
})->name('auth.github');
        
Route::get('/auth/github/callback', [LoginController::class,'githubCallback']);
            

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
