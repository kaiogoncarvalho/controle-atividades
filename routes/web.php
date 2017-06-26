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


Route::get('activity/activities', 'ActivityController@index')->name('activities');
Route::get('activity/home', 'ActivityController@home')->name('home');

Route::get('activity/create', 'ActivityController@create');
Route::get('activity/edit/{id}', 'ActivityController@edit');

Route::post('activity/creating', 'ActivityController@creating');
Route::post('activity/editing/{id}', 'ActivityController@editing');

Route::get('activity/delete/{id}', 'ActivityController@delete');





