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

Route::get( '/', 'FlightController@index');
Route::post( '/', 'FlightController@search');


Route::get('/result', function()
{
	$flights = Flight::all();
	//return $flights;
	return View::make('search_results')
		->with('flights',$flights );
});

Route::get('/forms', function()
{
	//return Redirect::to('/atm');
	return View::make('forms');
});

Route::get('/cancel', function()
{
	//return Redirect::to('/atm');
	return View::make('cancel');
});

Route::get('/test', function()
{
	return Flight::where('departure_flight_frequency', 'LIKE', '%Daily%')
		->orwhere('departure_flight_frequency', 'LIKE', '%We%')
		->get();

});


Route::get('/test2', function()
{
		
		$departure_date = strtotime('2015-05-31');
		$day = date('D', $departure_date);
		
		if($day == 'Mon')
		{
			return $departure_day = 'Mo';
		}
		else if($day == 'Tue')
		{
			return $departure_day = 'Tu';
		}
		else if($day == 'Wed')
		{
			return $departure_day = 'We';
		}
		else if($day == 'Thu')
		{
			return $departure_day = 'Th';
		}
		else if($day == 'Fri')
		{
			return $departure_day = 'Fr';
		}
		else if($day == 'Sat')
		{
			return $departure_day = 'Sa';
		}
		else
		{
			return $departure_day = 'Su';
		}


});

Route::get('/test3', function()
{
	$num_padded = sprintf("%02d", 11);
	return $num_padded; 

});