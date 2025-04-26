<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::get('/chat/all', [ChatController::class, 'allMessages'])->name('chat.all');
Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat.show');
Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
Route::delete('/chat/{chat}', [ChatController::class, 'destroy'])->name('chat.destroy');
