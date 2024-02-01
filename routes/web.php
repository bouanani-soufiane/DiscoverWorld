<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AventureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Route::group(['middleware' => 'guest'],function (){
    Route::get('/register' , [AuthController::class , 'register'])->name('register');
    Route::post('/register' , [AuthController::class , 'registerpost'])->name('register');
    Route::get('/login' , [AuthController::class , 'login'])->name('login');
    Route::post('/login' , [AuthController::class , 'loginpost'])->name('login');
//    Route::view('/','home')->name('home');
    Route::get('/' , [HomeController::class , 'index'])->name('home');
//});





Route::group(['middleware' => 'auth'],function (){
    Route::get('/profile' , [UserController::class , 'index'])->name('profile');
    Route::delete('/logout' , [AuthController::class , 'logout'])->name('logout');
});

Route::resource('aventure', AventureController::class);
Route::get('/aventuresingle/{id}' , [AventureController::class , 'showSingle'])->name('aventure.single');
Route::get('/showByContinent/{id}' , [AventureController::class , 'showByContinent'])->name('aventure.continent');

