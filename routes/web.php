<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/friend_requests', [\App\Http\Controllers\FriendRequestController::class, 'show'])->name('show_friend_requests');
Route::post('/friend_requests', [\App\Http\Controllers\FriendRequestController::class, 'store']);


Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');


Route::get('/feed', [\App\Http\Controllers\PostController::class, 'index'])->name('feed.index');
Route::get('/feed/create', [\App\Http\Controllers\PostController::class, 'create'])->name('feed.create');
Route::post('/feed/create', [\App\Http\Controllers\PostController::class, 'store'])->name('feed.store');

Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/', [\App\Http\Controllers\LoginController::class, 'store']);

Route::post('/logout', [\App\Http\Controllers\LogoutController::class, 'store'])->name('logout');



Route::get('/new_picture', [\App\Http\Controllers\ProfilePictureController::class, 'index'])->name('new_profile_picture.create');
Route::post('/new_picture', [\App\Http\Controllers\ProfilePictureController::class, 'store'])->name('new_profile_picture.store');

Route::get('/friends', [\App\Http\Controllers\FriendController::class, 'index'])->name('friends');


Route::get('/{user:username}', [\App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::post('/{user:username}', [\App\Http\Controllers\FriendRequestController::class, 'create'])->name('friend_request');
