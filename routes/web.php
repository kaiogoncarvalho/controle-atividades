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


Auth::routes();

Route::get('', function(){
    return view('welcome');
});


Route::get('/activities', 'ActivityController@index')->name('activities');
Route::get('/home', 'ActivityController@home')->name('home');

Route::get('activity/create', 'ActivityController@create');
Route::get('activity/edit/{id}', 'ActivityController@edit');

Route::post('activity/save/{id?}', 'ActivityController@save');





