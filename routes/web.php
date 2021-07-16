<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Anasayfa;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SlugController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Anasayfa::class)->name('anasayfa');

Route::middleware(['auth'])->group(function () {
    Route::resource('/comment', CommentController::class)->only('store','destroy');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin');
    })->name('admin');
    
    Route::resource('/posts', PostController::class);
    Route::put('/post/{post}}',[PostController::class,'featuredUpdate'])->name('posts.featuredUpdate');

    Route::resource('/categories', CategoryController::class);

    Route::resource('/users', UserController::class);
});
require __DIR__.'/auth.php';
Route::get('/{slug}',SlugController::class);
