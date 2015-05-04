<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('/atm');
});

Route::get('/atm','RouteController@atm');

Route::get('/otc','RouteController@otc');
Route::post('/otc','AuthController@login');

Route::get('/otc/main','RouteController@main');

//TELLERS
Route::get('/otc/tellers','TellerController@index');
Route::get('/otc/tellers/create','TellerController@create');
Route::post('/otc/tellers/create','TellerController@store');
Route::get('/otc/tellers/edit/{id}','TellerController@edit');
Route::post('/otc/tellers/edit/{id}','TellerController@update');
Route::get('/otc/tellers/activate/{id}', 'TellerController@activate');
Route::get('/otc/tellers/deactivate/{id}', 'TellerController@deactivate');



//CUSTOMERS
Route::get('/otc/customers','CustomerController@index');
Route::get('/otc/customers/create', 'CustomerController@create');
Route::post('/otc/customers/create', 'CustomerController@store');




