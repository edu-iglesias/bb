<?php

class TellerController extends BaseController {

	public function index()
	{
        $users = DB::table('users') 
         ->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('user_type','=','4')
         ->select('*', 'users.id')
         ->get();

        return View::make('otc.list_of_tellers')->with('users',$users);
	}

    public function create()
    {
        return View::make('otc.create_teller');
    }

    public function store()
    {
        $inputs = Input::all();

        $rules = array(     
            'email'    => 'Required|email|unique:users,email',
            'password'  =>'Required|min:5|Confirmed|max:20',
            'password_confirmation'=>'Required|min:5|max:20',
            'FirstName'     => 'Required|alpha_spaces|max:50',
            'LastName'     => 'Required|alpha_spaces|max:50',
            'MiddleName'     => 'Required|alpha_spaces|max:50',
            'ContactNumber' => 'Required|digits:10|numeric',
            'gender'  => 'Required|in:Male,Female,',
            'address'  => 'Required',
        );

        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $user = new User;
            $user->email = Input::get('email');
            $user->first_name = Input::get('FirstName');
            $user->last_name = Input::get('LastName');
            $user->middle_name = Input::get('MiddleName');
            $user->user_type = "4";
            $user->gender = Input::get('gender');
            $user->contact = Input::get('ContactNumber');
            $user->address = Input::get('address');
            $user->save();
            
            Session::put('success_user_created', "You have successfully added a new user.");
            return Redirect::back();

        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->update();
        Session::put('status', "You have successfully activated the user.");
        return Redirect::back();
    }


    public function deactivate($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->update();
        Session::put('status', "You have successfully deactivated the user.");
        return Redirect::back();
    }

}