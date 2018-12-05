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

Route::resource('kolekcja', 'CollectionController')->middleware('auth');
Route::patch('kolekcjaChangeOrder','CollectionController@changeOrder')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('kolekcjaapiIndex', 'CollectionController@apiIndex');
Route::post('kolekcjaapiStore', 'CollectionController@apiStore');
Route::get('kolekcjaapiEdit', 'CollectionController@apiEdit');
Route::get('kolekcjaapiShow', 'CollectionController@apiShow');