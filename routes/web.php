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

//  Route::get('/', function () {
//    return view('/Home');
// });

Route::middleware('auth_token')->group(function () {
	Route::get('/', 'HomeController@getIndex');
	Route::get('home', 'HomeController@getIndex')->name('home');
	Route::get('addEvent', 'addEvent@getIndex');

	Route::resource('article', 'ManagerArticleController');
	Route::get('articles', 'ManagerArticleController@show');

	Route::get('events', 'ManagerEventController@show')->name('events');
	Route::get('events/{status}', 'ManagerEventController@showStatus')->name('events.status');
	Route::get('event/{id}', 'ManagerEventController@edit')->name('event.edit');
	Route::put('event/{id}', 'ManagerEventController@update')->name('event.update');
	Route::delete('event/{id}', 'ManagerEventController@destroy')->name('event.destroy');
	Route::get('event', 'ManagerEventController@create')->name('event.create');
	Route::post('event', 'ManagerEventController@store')->name('event.store');
	Route::put('event', 'ManagerEventController@delete')->name('event.delete');
	
});
Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login', 'LoginController@postLogin');