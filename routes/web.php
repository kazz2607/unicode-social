<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    dd($user);
});

Route::get('auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
     $user = Socialite::driver('google')->user();
    dd($user);
});
 
Route::get('auth/github', function () {
     return Socialite::driver('github')->redirect();
});
        
Route::get('/auth/github/callback', function () {
      $user = Socialite::driver('github')->user();
      dd($user);
});
            
