<?php

class RouteController extends BaseController {

	function atm()
	{
		return View::make('atm.index');
	}

	function otc()
	{
		return View::make('otc.index');
	}

	function profile()
	{
		return View::make('otc.profile');
	}

	function profile_atm()
	{
		return View::make('atm.profile');
	}

}