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

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('profile/{id}/{slug}','ProfileController@index');
	Route::get('students','AjaxController@index');
	Route::get('students/read_data','AjaxController@read_data');
	Route::post('students/store','AjaxController@store');
	Route::get('students/destroy','AjaxController@destroy');
	Route::get('students/edit','AjaxController@edit');
	Route::post('students/update','AjaxController@update');
});
Route::get('/logout', 'Auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
