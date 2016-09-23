<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

// Authentication routes
Route::get('/activation', 'UserController@activation');
Route::get('/confirm', 'UserController@confirmNewUser');
Route::get('/sendOtp', 'UserController@sendOtp');
Route::post('/verify', 'UserController@verify');

//Stock routes
Route::get('edit_stocks', function(){
	return view('add_stocks');
});
Route::get('/insert_stocks', 'StocksController@insertStocks');
Route::post('/add_stocks', 'StocksController@addStocks');
Route::get('/stocks_current', 'StocksController@getCurrentPrice');