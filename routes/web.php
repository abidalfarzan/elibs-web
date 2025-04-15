<?php

use App\Http\Controllers\HallController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage', ['title' => 'Homepage']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/hall', [HallController::class, 'index']);
Route::get('/hall/book/{book:slug}', [HallController::class, 'singleBook']);
Route::get('/hall/author/{author:slug}', [HallController::class, 'singleAuthor']);
Route::get('/hall/category/{category:slug}', [HallController::class, 'singleCategory']);

Route::get('/auth/login', [LoginController::class, 'login']);
Route::post('/auth/login', [LoginController::class, 'authenticate']);

Route::get('/auth/registration', [LoginController::class, 'registration']);
Route::post('/auth/registration', [LoginController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
});