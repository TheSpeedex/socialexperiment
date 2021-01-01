<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', function () {
    Route ::view('home', 'home')->middleware('auth');
    #dd(\Illuminate\Support\Facades\Auth::user());
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('posts',[PostController::class, 'index'])->middleware('auth');



Route::get('profile',[ProfileController::class,'profile'])->middleware('auth');


Route::get('post-creator',[PostController::class,'naviToCreatePost'])->middleware('auth');

Route::post('createPost',[PostController::class,'createPost'])->name('post-creator')->middleware('auth');

Route::get('post/{id}',[PostController::class, 'show'])->name('postEnlarge')->middleware('auth');

Route::get('post/edit/{id}',[PostController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('post',[PostController::class, 'update'])->name('update')->middleware('auth');

Route::post('edit-comment',[PostController::class,'edit_comment'])->middleware('auth');
Route::post('save-comment',[PostController::class,'save_comment'])->middleware('auth');