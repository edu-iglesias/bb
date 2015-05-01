<?php

class TellerController extends BaseController {

	public function index()
	{
        $users = DB::table('users') 
         ->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('user_type','=','4')
         ->get();

        return View::make('otc.list_of_tellers')->with('users',$users);
	}

}