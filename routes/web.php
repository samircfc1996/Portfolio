<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioPhotoController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PortfolioController;
use Illuminate\Support\Facades\Auth;
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
 Route::get('/',function(){
    return view('welcome') ;
 });


Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/',[HomeController::class,'index'])->name('a_home');
    Route::resource('services',ServiceController::class);
    Route::resource('posts',PostController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('portfolios',PortfolioController::class);
    Route::resource('portfolios.photos',PortfolioPhotoController::class);




});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




