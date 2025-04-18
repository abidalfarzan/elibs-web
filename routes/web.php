<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/hall', [HallController::class, 'index']);
Route::get('/hall/book/{book:slug}', [HallController::class, 'singleBook']);
Route::get('/hall/author/{author:slug}', [HallController::class, 'singleAuthor']);
Route::get('/hall/category/{category:slug}', [HallController::class, 'singleCategory']);

Route::get('/auth/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth/login', [LoginController::class, 'authenticate']);

Route::get('/auth/registration', [LoginController::class, 'registration'])->middleware('guest');
Route::post('/auth/registration', [LoginController::class, 'store']);

Route::post('/auth/logout', [LoginController::class, 'logout']);

Route::prefix('/dashboard')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboard', ['title' => 'Dashboard']);
    });

    // Category
    Route::get('/category', [CategoryController::class, 'index']);
    // Create Category
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    // Edit Category
    Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{category:slug}', [CategoryController::class, 'update']);

    // Author
    Route::resource('/author', AuthorController::class);
});