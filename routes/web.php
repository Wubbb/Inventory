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

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/reports', 'HomeController@craig')->name('reports');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// Route::resource('items', 'ItemsController');
Route::resource('items','ItemsController');
Route::resource('employee', 'EmployeesController');

//Route::get('/',"RedirectController@index")->name("RedirectIndex");

Route::get('/redirectme', function() {
	return redirect('/items')->with('status','ulol!');
});

Route::get('/reports','ReportsController@index')->name('reports');

Route::get('/lostReports','LostReportsController@index')->name('lostReports');

Route::get('/techbag','TechbagsController@index')->name('techbag');

