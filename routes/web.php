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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', 'CashController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/cash', 'CashController@store');
Route::get('/cash/{cash}/edit','CashController@edit');
Route::post('/cash/{cash}','CashController@update');
Route::delete('cash/{cash}', 'CashController@destroy');
