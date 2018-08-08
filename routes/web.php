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
	Route::group(['prefix'=>'students'],function(){
		Route::get('/','AjaxController@index');
		//load trang
		Route::get('read_data','AjaxController@read_data');
		//phân trang
		Route::get('page/ajax','AjaxController@studentPage');
		Route::post('store','AjaxController@store');
		Route::get('destroy','AjaxController@destroy');
		Route::get('edit','AjaxController@edit');
		Route::post('update','AjaxController@update');
	});
});
Route::get('/logout', 'Auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
