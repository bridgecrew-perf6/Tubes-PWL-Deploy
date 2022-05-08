<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/api/articles', [HomeController::class, 'fetch'])->middleware('auth');
Route::get('/api/liked', [LikeController::class, 'fetch'])->middleware('auth');

Route::get('/login', [UserController::class, 'loginView'])->name('loginrollback')->middleware('guest'); //cek di middleware.authenticate
Route::post('/login', [UserController::class, 'loginLauncher']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);

Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth');
Route::post('/article/create', [ArticleController::class, 'store'])->middleware('auth');
Route::get('/article/id/{id}', [ArticleController::class, 'show'])->middleware('auth');
Route::get('/article/edit/id/{id}', [ArticleController::class, 'edit'])->middleware('auth');
Route::post('/article/edit/id/{id}', [ArticleController::class, 'update'])->middleware('auth');
Route::get('/article/delete/id/{id}', [ArticleController::class, 'destroy'])->middleware('auth');

Route::get('/like/{article_id}', [LikeController::class, 'like'])->middleware('auth');
Route::get('/liked', [LikeController::class, 'show'])->middleware('auth');

Route::get('/komentar/send/{article_id}', [ArticleController::class, 'komentar'])->middleware('auth');
Route::get('/api/articles/search/{id}', [HomeController::class, 'search'])->middleware('auth');