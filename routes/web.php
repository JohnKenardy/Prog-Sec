<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RankController;
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
    Route::get('/manageUsers',[Controller::class,'manageUsers'])->name('manage-users')->middleware('isLoggedIn');
    Route::get('/manageItems',[Controller::class,'manageItems'])->name('manage-items')->middleware('isLoggedIn');
    Route::get('/manageRanks',[Controller::class,'manageRanks'])->name('manage-ranks')->middleware('isLoggedIn');
    Route::get('/manageCategories',[Controller::class,'manageCategories'])->name('manage-categories')->middleware('isLoggedIn');
    Route::get('/manageUnits',[Controller::class,'manageUnits'])->name('manage-units')->middleware('isLoggedIn');
    Route::get('/manageStorage',[Controller::class,'manageStorage'])->name('manage-storage')->middleware('isLoggedIn');
    Route::get('/manageTypes',[Controller::class,'manageTypes'])->name('manage-types')->middleware('isLoggedIn');
    Route::post('/addItem',[ItemController::class,'addItem'])->name('addItem');
    Route::get('/create-rank',[Controller::class,'addRank'])->name('create-rank')->middleware('isLoggedIn');
    Route::post('/addRank',[RankController::class,'addRank'])->name('addRank');
    Route::post('/addCategory',[CategoryController::class,'addCategory'])->name('addCategory');
    Route::post('/addUnit',[UnitController::class,'addUnit'])->name('addUnit');
    Route::post('/addStorage',[StorageController::class,'addStorage'])->name('addStorage');
    Route::post('/addType',[TypeController::class,'addType'])->name('addType');
    Route::post('/addUser',[UserController::class,'registerUser'])->name('addUser');


});

