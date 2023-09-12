<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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


//Home page
Route::get('/', function () {
    return view('home');
});

//Register page
Route::get('/register',[UserController::class,'register'])->middleware('guest');

//Store a user
Route::post('/users',[UserController::class, 'store'] );

//Log out a user
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Show Login page
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Login a user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//all posts
Route::get('/posts', [PostController::class, 'index'] );

//Show create form 
Route::get('/posts/create',[PostController::class, 'create'] )->middleware('auth');

//Store a post
Route::post('/posts',[PostController::class, 'store'] )->middleware('auth');

//Show edit form
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->middleware('auth');

//Update edit form
Route::put('/posts/{post}',[PostController::class, 'update'])->middleware('auth');

//Delete post
Route::delete('/posts/{post}',[PostController::class,'destroy'])->middleware('auth');

//Manage post
Route::get('/posts/manage',[PostController::class,'manage'])->middleware('auth');

//Single post
Route::get('/posts/{post}',[PostController::class, 'show'] );




