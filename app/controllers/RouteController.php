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

}