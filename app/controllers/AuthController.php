<?php

class AuthController extends BaseController {

	public function login()
	{
		$userdata = array(
        	'email'     => Input::get('email'),
        	'password'  => Input::get('password')
    	);


    	// authenticate email and password through user table

    	if (Auth::user()->attempt($userdata)) 
    	{
            $user = User::find(Auth::user()->get()->id);
            Session::put('user_first_name',$user->first_name);
            Session::put('user_last_name',$user->last_name);
            Session::put('user_id',$user->id);
            
			return Redirect::to('/otc/profile');

    	}
    	else
    	{
    		Session::put('login_failure','Authentication Failed. Please try again.');
    		return  Redirect::back()->withInput();
    	}
    }

    public function login_atm()
    {

        //return Input::get('accountNumber') . ' ' . Input::get('pinNumber');
        $userdata = array(
            'id'     => Input::get('accountNumber'),
            'password'  => Input::get('pinNumber')
        );


        // authenticate email and password through user table
        if (Auth::customer()->attempt($userdata)) 
        {
            $user = Accounts::find(Auth::customer()->get()->id);
            Session::put('user_first_name',$user->first_name);
            Session::put('user_last_name',$user->last_name);
            Session::put('user_id',$user->account_number);
            
            return Redirect::to('/otc/profile');

        }
        else
        {
            Session::put('login_failure','Authentication Failed. Please try again.');
            return  Redirect::back()->withInput();
        }
    }

}