<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* These routes are defining the endpoints for handling different actions related to threads in a web
application. */
Route::get('/threads', [App\Http\Controllers\ThreadsController::class, 'index']);
Route::get('/threads/create', [App\Http\Controllers\ThreadsController::class, 'create']);
Route::post('/threads', [App\Http\Controllers\ThreadsController::class, 'store']);
Route::get('/threads/{channel}/{thread}', [App\Http\Controllers\ThreadsController::class, 'show']);
Route::get('threads/{channel}', [App\Http\Controllers\ThreadsController::class, 'index']);
// Route::resource('threads', ThreadsController::class)->except(['update', 'destroy', 'edit']);
Route::post('/threads/{channel}/{thread}/replies', [App\Http\Controllers\RepliesController::class, 'store']);
