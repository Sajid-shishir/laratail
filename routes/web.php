<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::get('/user/{user:name}/post','ProfileController@index')->name('profile');

Route::get('/post','PostController@index')->name('post');
Route::post('/post','PostController@store');
Route::delete('/post/{post}','PostController@destroy')->name('post.destroy');

Route::post('/post/{post}/likes','PostLikeController@store')->name('post.likes');
Route::delete('/post/{post}/likes','PostLikeController@destroy')->name('post.likes');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

