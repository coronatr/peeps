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
    return view('welcome');
});


Route::get('/addnew','PeepController@addnew')->name('people.addnew')->middleware('auth');
Route::get('/listpeople','PeepController@isAdmin')->name('people.list')->middleware('auth');
Route::get('/peeps/showall','PeepController@isAdmin')->middleware('auth');
Route::post('/save','PeepController@save')->name('people.save')->middleware('auth');
Route::delete('/removePeep/{id}','PeepController@delete')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
