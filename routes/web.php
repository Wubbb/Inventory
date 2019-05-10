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
    return Redirect::to('login');
});
Auth::routes();
Route::get('/home', 'UserController@index')->name('home');
Route::get('/assign/{assign}', 'AssignsController@index')->name('assign.index');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
Route::resource('items','ItemsController');
Route::resource('assignto','NewAssignToController');
Route::resource('disposed', 'DisposedItemsController');
Route::post('/user', 'UserController@save')->name('user.save');
Route::match(['put','patch'], '/user/{user}', 'UserController@change')->name('user.change');
Route::resource('techbagReports','TechbagReportsController');
Route::resource('techbagItenerary', 'TechbagIteneraryController');
Route::get('/itenerary', 'TechbagIteneraryController@change')->name('itenerary.change');
Route::resource('hcicomputers','RHUComputerController');
