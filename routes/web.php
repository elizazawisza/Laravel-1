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
Route::resource('pracownicy', 'Pracownicy')->middleware('auth');
Route::patch('kolekcjaChangeOrder','CollectionController@changeOrder')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('kolekcjaapiIndex', 'CollectionController@apiIndex');
Route::get('/kolekcja/kolekcjaapiEdit/{id}', 'CollectionController@apiEdit');
Route::get('/kolekcja/kolekcjaapiShow/{id}', 'CollectionController@apiShow');
Route::get('/kolekcja/kolekcjaapiCreate', 'CollectionController@apiCreate');
Route::patch('/kolekcja/kolekcjaapiPhotoUpdate/{id}', 'CollectionController@apiPhotoUpdate');

Route::get('pracownicyapiIndex', 'Pracownicy@apiIndex');
Route::get('/pracownicy/pracownicyApiShow/{id}', 'Pracownicy@ApiShow');
Route::get('/pracownicy/pracownicyApiEdit/{id}', 'Pracownicy@ApiEdit');

