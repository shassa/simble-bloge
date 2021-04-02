<?php

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


Route::resource('/','articleController');
Route::resource('article','articleController');
Route::resource('category','categoryController');
Route::resource('contact','contactController');
Route::resource('admindash','userController');
Route::resource('comment','commentController');
Route::resource('home','HomeController');

Route::get('/about', function () {
    return view('about');
});

 Auth::routes();

