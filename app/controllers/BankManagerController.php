<?php

class BankManagerController extends BaseController {

	public function index()
	{
		$users = DB::table('users') 
         ->join('roles', 'users.user_type', '=', 'roles.id')
         ->where('user_type','=','2')
         ->select('*', 'users.id','users.created_at')
         ->get();

        return View::make('otc.list_of_bank_manager')->with('users',$users);
	}

	public function create()
    {
        return View::make('otc.create_bank_manager');
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
            $user->user_type = "2";
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

    public function edit($id)
    {
        $user = User::where('id','=',$id)
            ->where('user_type','=','2')
            ->first();

        if($user == null)
        {
            return Redirect::back();
        }

        Session::put('email', $user->email);
        Session::put('FirstName',$user->first_name);
        Session::put('LastName',$user->last_name);
        Session::put('MiddleName',$user->middle_name);
        Session::put('ContactNumber',$user->contact);
        Session::put('gender',$user->gender);
        Session::put('address',$user->address);

        return View::make('otc.edit_bank_manager');
    }

    public function update($id)
    {

        $inputs = Input::all();

        $user = User::where('id','=',$id)
            ->where('user_type','=','2')
            ->first();

        //return $user;

        if(Input::get('email') == $user->email)
        {
            $email_rule = '';
        }
        else
        {
            $email_rule = 'Required|email|unique:users,email';
        }

        if(Input::get('password') != "")
        {
            $password_rule = 'Required|min:5|Confirmed|max:20';
            $password_confirmation_rule = 'Required|min:5|max:20';
        }
        else
        {
            $password_rule = '';
            $password_confirmation_rule = '';
        }

        $rules = array(     
            'email'    => $email_rule,
            'password'  => $password_rule,
            'password_confirmation'=> $password_confirmation_rule,
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
            Session::put('success_user_created', 'You have successfully edited the user information.');

            $user->email = Input::get('email');
            $user->first_name = Input::get('FirstName');
            $user->last_name = Input::get('LastName');
            $user->middle_name = Input::get('MiddleName');
            $user->user_type = "2";
            $user->gender = Input::get('gender');
            $user->contact = Input::get('ContactNumber');
            $user->address = Input::get('address');
            $user->save();

            return Redirect::to('/otc/bank_manager');
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


	public function auditTrail()
	{
		$transactions = DB::table('transactions')
			->join('accounts','transactions.account_number','=','accounts.id')
			->get();
		
		return View::make('otc.list_of_transactions')
			->with('transactions',$transactions);
	}


}