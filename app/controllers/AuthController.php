<?php

class AuthController extends BaseController {

	public function login()
	{
		$userdata = array(
        	'email'     => Input::get('email'),
        	'password'  => Input::get('password')
    	);


    	// authenticate email and password through user table
    	if (Auth::attempt($userdata)) 
    	{
    		$roleId = Assigned::where('user_id','=',Auth::id())->first();

            $user = User::find(Auth::id());
            Session::put('user_first_name',$user->first_name);
            Session::put('user_last_name',$user->last_name);
            Session::put('user_id',$user->id);
            
            return 'Login Success!';
			//return Redirect::to('/otc/home');

    	}
    	else
    	{
    		Session::put('login_failure','Authentication Failed. Please try again.');
    		return  Redirect::back()->withInput();
    	}
    }

}