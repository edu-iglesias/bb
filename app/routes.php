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
Route::post('/atm','AuthController@login_atm');

Route::get('/otc/profile','RouteController@profile');
Route::get('/atm/profile','RouteController@profile_atm');


//TELLERS
Route::get('/otc/tellers','TellerController@index');
Route::get('/otc/tellers/create','TellerController@create');
Route::post('/otc/tellers/create','TellerController@store');
Route::get('/otc/tellers/edit/{id}','TellerController@edit');
Route::post('/otc/tellers/edit/{id}','TellerController@update');
Route::get('/otc/tellers/activate/{id}', 'TellerController@activate');
Route::get('/otc/tellers/deactivate/{id}', 'TellerController@deactivate');
Route::get('/otc/tellers/transactions', 'TellerController@transactions');
Route::get('/otc/tellers/withdraw', 'TellerController@withdraw');
Route::post('/otc/tellers/withdraw', 'TellerController@acceptWithdraw');
Route::get('/otc/tellers/deposit', 'TellerController@deposit');
Route::post('/otc/tellers/deposit', 'TellerController@acceptDeposit');
Route::get('/otc/tellers/checkAccount/{accountNumber}', 'TellerController@checkAccount');

//Bank Assistant
Route::get('/otc/bank_assistant','BankAssistantController@index');
Route::get('/otc/bank_assistant/create','BankAssistantController@create');
Route::post('/otc/bank_assistant/create','BankAssistantController@store');
Route::get('/otc/bank_assistant/edit/{id}','TellerController@edit');
Route::post('/otc/bank_assistant/edit/{id}','TellerController@update');


//CUSTOMERS
Route::get('/otc/customers','CustomerController@index');
Route::get('/otc/customersfixed','CustomerController@customerFixed');
Route::get('/otc/customers/create', 'CustomerController@create');
Route::post('/otc/customers/create', 'CustomerController@store');
Route::get('/otc/customers/edit/{accountNumber}', 'CustomerController@edit');
Route::post('/otc/customers/edit/{accountNumber}', 'CustomerController@update');








