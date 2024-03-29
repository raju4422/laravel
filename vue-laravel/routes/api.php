<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


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


Route::post('save',[MainController::class,'save']);
 Route::get('getdata',[MainController::class,'index'])->name('getdata');
 Route::post('delete',[MainController::class,'delete']);
 Route::post('getdatabyid',[MainController::class,'getDataById']);
 Route::post('update',[MainController::class,'update']);
 Route::post('login',[MainController::class,'login']);
 Route::post('logout',[MainController::class,'logout']);
 Route::get('test',[MainController::class,'test'])->name('test')->middleware('check');






