<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/backend/category', 'CategoryController')->middleware('auth');
Route::resource('/backend/product', 'ProductController')->middleware('auth');
Route::resource('/backend/user', 'UserController')->middleware('auth');
Route::resource('/backend/member', 'MemberController')->middleware('auth');
Route::resource('/backend/stock', 'StockController')->middleware('auth');
