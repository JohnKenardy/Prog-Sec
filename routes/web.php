<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;


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

Route::get('/login',[Controller::class,'login']);
Route::post('/loginUser',[UserController::class,'loginUser'])->name("loginUser");
Route::get('/logout',[Controller::class,'logout'])->name('logout');

Route::get('/dashboard',[Controller::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');



Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/create-item',[Controller::class,'addItem'])->name('create-item')->middleware('isLoggedIn');
    Route::post('/addItem',[ItemController::class,'addItem'])->name('addItem')->middleware('isLoggedIn');
});
Route::group(['prefix' => '/item'], function () {
    //Route::post('/addItem',[ItemController::class,'addItem'])->name('addItem')->middleware('isLoggedIn');
});

Route::group(['prefix' => '/type'], function () {
    Route::get('/getAll',[TypeController::class,'index'])->middleware('isLoggedIn');
});

Route::group(['prefix' => '/unit'], function () {
    Route::get('/getAll',[UnitController::class,'index'])->middleware('isLoggedIn');
});

Route::group(['prefix' => '/storage'], function () {
    Route::get('/getAll',[StorageController::class,'index'])->middleware('isLoggedIn');
});
