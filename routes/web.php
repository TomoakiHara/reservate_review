<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\FavoriteController;
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

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [ShopController::class, 'search']);
Route::post('/detail', [ShopController::class, 'detail']);
Route::post('/reserve', [ReserveController::class, 'reserve'])->middleware('auth');
Route::post('/cancel', [ReserveController::class, 'cancel']);
Route::get('/mypage', [ReserveController::class, 'mypage']);
Route::post('/favorite', [FavoriteController::class, 'favorite'])->middleware('auth');
Route::post('/delete', [FavoriteController::class, 'delete']);
Route::get('/user', [UserController::class, 'user'])->name('login');;
Route::post('/register', [UserController::class, 'register']);
Route::get('/auth', [UserController::class, 'auth']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/login_reserve', [UserController::class, 'login_reserve']);
Route::get('/logout', [UserController::class, 'logout']);

Route::post('/evaluate', [ShopController::class, 'evaluate']);
Route::post('/post_evaluate', [ReserveController::class, 'post_evaluate']);
