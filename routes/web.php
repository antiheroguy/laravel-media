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

Route::group(['prefix' => 'admin', 'middleware' => 'login'], function () {
	Route::get('', 'AdminController@index');
	Route::group(['prefix' => 'ajax'], function () {
		Route::post('album', 'AjaxController@album');
		Route::post('mail', 'AjaxController@mail');
	});
	Route::resource('album', 'AlbumController');
	Route::resource('item', 'ItemController');
	Route::resource('user', 'UserController');
});

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logout');

Route::get('', 'HomeController@index');
Route::get('item/{id?}', 'HomeController@item');
Route::get('album/{id?}', 'HomeController@album');
Route::post('detail', 'HomeController@detail');