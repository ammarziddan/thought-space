<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\WriteController;
use App\Http\Controllers\RegisterController;

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

// HOME
// Route::get('/', [PostController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

// ABOUT
Route::get('/about', [AboutController::class, 'index'])->name('about');

// TOPICS
Route::get('/topics', [TopicController::class, 'index']);
Route::get('/topics/{tag:slug}', [TopicController::class, 'show']);

// POST
// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::resource('/posts', PostController::class)->names([
    'create' => 'posts.create'
]);

// USER
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user:username}', [UserController::class, 'show']);
// USER UPDATE
Route::get('/users/{user:username}/settings', [UserController::class, 'settings'])->name('usersetting.index');
Route::patch('/users/{user:username}/settings', [UserController::class, 'update'])->middleware('auth')->name('usersetting.update');
// USER DELETE




// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);