<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[Api::class, 'getUsers']);
Route::delete('/delete/{id}',[Api::class, 'delete']);
Route::post('/get-user/{id}',[Api::class, 'getUserById']);
Route::post('/update',[Api::class, 'updateUser']);
Route::post('/add-user',[Api::class, 'addUser']);
Route::post('/authenticate',[Api::class, 'authenticate']);




