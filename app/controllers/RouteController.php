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
		$user = User::find(Session::get('user_id'));
		return View::make('otc.profile')->with('user',$user);
	}

	function profile_atm()
	{
		return View::make('atm.profile');
	}

}