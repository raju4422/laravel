<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'registerForm'])->name('register');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('/show', [UserController::class, 'showUsers'])->name('show');
Route::get('/edit/{id}', [UserController::class, 'showUsers']);
Route::post('/update', [UserController::class, 'updateUser'])->name('update');
Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');


Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('authenticate');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/test', [UserController::class, 'test'])->name('test');
