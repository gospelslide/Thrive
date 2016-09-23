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

//Transaction Routes
Route::get('/history', 'TransactionController@transaction_history');
Route::get('/queue', 'TransactionController@transaction_queue');

//Liquidity Routes
Route::get('/manage', 'LiquidityController@surplus');

//Account Routes
Route::get('/add_saving', 'AccountController@add_saving');
Route::post('/edit_saving', 'AccountController@edit_saving');
Route::post('/register_saving', 'AccountController@register_saving');

Route::get('/add_current', 'AccountController@add_current');
Route::get('/edit_current', 'AccountController@edit_current');
Route::post('/update_current', 'AccountController@update_current');
Route::post('/register_current', 'AccountController@register_current');

Route::get('/add_credit', 'AccountController@add_credit');
Route::post('/edit_credit', 'AccountController@edit_credit');
Route::post('/register_credit', 'AccountController@register_credit');