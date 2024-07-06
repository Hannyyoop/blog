<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::resource('article', ArticleController::class);
     Route::resource('category', CategoryController::class);
    Route::get('users', [HomeController::class, 'users'])->name('users');

});


Route::get('/home', [HomeController::class, 'index'])->name('home');
