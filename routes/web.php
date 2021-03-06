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
Route::get('/form', function() {
	return view('form');
});

// Authentication routes
Route::get('/activation', 'UserController@activation');
Route::get('/confirm', 'UserController@confirmNewUser');
Route::get('/sendOtp', 'UserController@sendOtp');
Route::post('/verify', 'UserController@verify');

//Graph routes
Route::get('/graph', 'MLC@demo');
Route::get('/compute', 'MLC@compute');


//Stock routes
Route::get('/edit_stocks', 'StocksController@sendList');
Route::get('/insert_stocks', 'StocksController@insertStocks');
Route::post('/add_stocks', 'StocksController@addStocks');
Route::get('/stocks_current', 'StocksController@getCurrentPrice');
Route::get('/stocks_predict', 'StocksController@predict');

//Currency routes 
Route::get('/current_fx', 'CurrencyController@currentFxRates');
Route::get('/time', 'CurrencyController@time');
Route::get('/currency_predict', 'CurrencyController@predict');

//Transaction Routes
Route::get('/history', 'TransactionController@transaction_history');
Route::get('/queue', 'TransactionController@transaction_queue');

//Liquidity Routes
Route::get('/manage', 'LiquidityController@surplus');

//Account Routes
Route::get('/add_saving', 'AccountController@add_saving');
Route::post('/register_saving', 'AccountController@register_saving');

Route::get('/add_current', 'AccountController@add_current');
Route::post('/register_current', 'AccountController@register_current');

Route::get('/add_credit', 'AccountController@add_credit');
Route::post('/register_credit', 'AccountController@register_credit');

//Payment Routes
Route::get('/add_payment', 'TransactionController@add_payment');
Route::post('/update_payment', 'TransactionController@update');

//Notification Routes
Route::get('/mark_as_read', 'NotificationController@markAsRead');
Route::get('/notifications', 'NotificationController@notifications');

//Generate Report
Route::get('/generate', 'NotificationController@generate_report');

//Graphs 
Route::get('/graphex', function(){
	return view('graphex');
});

//Logout
Route::get('/logout', 'UserController@logout');