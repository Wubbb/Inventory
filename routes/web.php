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
//Route::get('/reports', 'HomeController@craig')->name('reports');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// Route::resource('items', 'ItemsController');
Route::resource('items','ItemsController');

Route::resource('disposed', 'DisposedItemsController');
//Route::resource('employee', 'EmployeeController');


Route::get('userReports', function(){
    $users = DB::table('users')->get();
    return view('reports.users')->with('users', $users);
});
Route::get('itemsReports', function(){
    $items = DB::table('items')->get();
    return view('reports.items')->with('items', $items);
});

Route::resource('techbagReports','TechbagReportsController');
