<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

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

Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::post('/like/{post}',  [App\Http\Controllers\LikesController::class, 'store']);

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::post('/c/{post}', [App\Http\Controllers\CommentsController::class, 'store']);

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/s', [App\Http\Controllers\UserController::class, 'search']);

Route::get('/saved/{user}', [App\Http\Controllers\SavesController::class, 'index']);
Route::any('/saves/{post}', [App\Http\Controllers\SavesController::class, 'store']);
