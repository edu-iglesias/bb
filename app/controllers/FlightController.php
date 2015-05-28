<?php

class FlightController extends BaseController {

	public function index()
	{

		$locations = DB::table('flights')
			->distinct()
			->lists('departure_route', 'departure_route');

		array_unshift($locations , " ");

		return View::make('index')->with('locations',$locations);
	}

	public function search()
	{
		$departure_date_temp = Input::get('start');
		$departure_date = strtotime($departure_date_temp);
		$day = date('D', $departure_date);

		$return_date_temp = Input::get('end');
		$return_date = strtotime($return_date_temp);
		$day2 = date('D', $return_date);
		
		if($day == 'Mon')
		{
			$departure_day = 'Mo';
		}
		else if($day == 'Tue')
		{
			$departure_day = 'Tu';
		}
		else if($day == 'Wed')
		{
			$departure_day = 'We';
		}
		else if($day == 'Thu')
		{
			$departure_day = 'Th';
		}
		else if($day == 'Fri')
		{
			$departure_day = 'Fr';
		}
		else if($day == 'Sat')
		{
			$departure_day = 'Sa';
		}
		else
		{
			$departure_day = 'Su';
		}

		if($day2 == 'Mon')
		{
			$return_day = 'Mo';
		}
		else if($day2 == 'Tue')
		{
			$return_day = 'Tu';
		}
		else if($day2 == 'Wed')
		{
			$return_day = 'We';
		}
		else if($day2 == 'Thu')
		{
			$return_day = 'Th';
		}
		else if($day2 == 'Fri')
		{
			$return_day = 'Fr';
		}
		else if($day2 == 'Sat')
		{
			$return_day = 'Sa';
		}
		else
		{
			$return_day = 'Su';
		}

		
		$destination = Input::get('destination');

		$flights  = DB::select("SELECT * FROM flights WHERE departure_route = '$destination' AND  (departure_flight_frequency LIKE '%Daily%' OR departure_flight_frequency LIKE '%$departure_day%')
			AND (return_flight_frequency LIKE '%Daily%' OR return_flight_frequency LIKE '%$return_day%')");

		return View::make('search_results')
			->with('flights',$flights );
	}

}
