<?php

use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\RepliesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* These routes are defining the endpoints for handling different actions related to threads in a web
application. */
Route::get('/threads', [ThreadsController::class, 'index']);
Route::get('/threads/create', [ThreadsController::class, 'create']);
Route::post('/threads', [ThreadsController::class, 'store']);
Route::get('/threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::delete('/threads/{channel}/{thread}', [ThreadsController::class, 'destroy']);
Route::get('threads/{channel}', [ThreadsController::class, 'index']);
// Route::resource('threads', ThreadsController::class)->except(['update', 'destroy', 'edit']);
Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store']);
Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);
Route::delete('/replies/{reply}', [RepliesController::class, 'destroy']);

Route::get('profile/{user}', [ProfilesController::class, 'show'])->name('profile');
