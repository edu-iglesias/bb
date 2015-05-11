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

            if($user->status == 0)
            {
                Session::put('login_failure','Your account has been deactivated. Please contact authorized Personnel');
                return  Redirect::back()->withInput();
            }

            Session::put('user_first_name',$user->first_name);
            Session::put('user_last_name',$user->last_name);
            Session::put('user_id',$user->id);
            Session::put('user_type',$user->user_type);
            
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

            if($user->status == 0)
            {
                Session::put('login_failure','Your account has been deactivated. Please contact authorized Personnel');
                return  Redirect::back()->withInput();
            }

            Session::put('user_first_name',$user->first_name);
            Session::put('user_last_name',$user->last_name);
            Session::put('user_id',$user->account_number);
            Session::put('user_account_number',$user->id);

            
            
            return Redirect::to('/atm/profile');

        }
        else
        {
            Session::put('login_failure','Authentication Failed. Please try again.');
            return  Redirect::back()->withInput();
        }
    }

    public function editpass($id)
    {
        $user = Auth::find(Auth::customer()->get()->id);
        
        
        return View::make('atm.edit_pass')->with('user',$user);
    }

    public function changepass($id)
    {
       $inputs = Input::all();

        $user = Accounts::find($id);
      
        $userpass=$user->password;

        $newpass = $inputs['newpass'];
        
        if(!Hash::check($inputs['oldpass'], $user->password))
        {
            $oldpass = 'Required|min:5|max:20|Confirmed';
        }
        else
        {
            $oldpass = '';
        }

        if($inputs['confirmpass'] != $inputs['newpass'])
        {
            $conf = 'Required|min:5|max:20|Confirmed';
        }
        else
        {
            $conf = '';
        }
       

        $rules = array(     
            'oldpass'  => $oldpass,
            'newpass'  => 'Required|min:5|max:20',
            'confirmpass'  => $conf,
             
        );


        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {

            $user->password = Hash::make(Input::get('newpass'));

            $user->save();

           
            Session::put('success_user_created', 'You have successfully edited your password.');

            return Redirect::to('/atm/profile');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }

    public function deposit($id)
    {
        $user = Auth::find(Auth::customer()->get()->id);
        
        
        return View::make('atm.deposit')->with('user',$user);
    }


    public function storedeposit($id)
    {
       $inputs = Input::all();

        $user = Accounts::find(Auth::customer()->get()->id);
      
        $current_amount = DB::table('accounts')->where('id',Auth::customer()->get()->id)->sum('balance');

        $amount = $inputs['amount'];
        
        
        $rules = array(     
            'amount'  => 'Required|max:50000|numeric|between:500,50000',
             
        );


        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $currentBalance = $user->balance + $amount;

            $trans = new transaction;
            $trans->account_number = Auth::customer()->get()->id;
            $trans->transaction = 'deposit';
            $trans->amount = $amount;
            $trans->total_balance = $currentBalance;
            $trans->type = "atm";


            $user->balance += $amount ;

            $user->save();
            $trans->save();

           
            Session::put('success_user_created', 'You have successfully deposited to your account.');

            return Redirect::to('/atm/deposit/{id}');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }

    public function withdraw($id)
    {
        $user = Auth::find(Auth::customer()->get()->id);
        
        
        return View::make('atm.withdraw')->with('user',$user);
    }


    public function storewithdraw($id)
    {
       $inputs = Input::all();

        $user = Accounts::find(Auth::customer()->get()->id);
      
        $current_amount = DB::table('accounts')->where('id',Auth::customer()->get()->id)->sum('balance');

        $amount = $inputs['amount'];
        
        $rules = array(     
            'amount'  => 'Required|max:10000|numeric|between:100,10000',
             
        );


        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $accountid = Auth::customer()->get()->id;

            $date = date('Y-m-d');
            $transactionCheck = DB::table('transactions') 
             ->where('account_number', $accountid)
             ->where('created_at','like', '%'.$date.'%')
             ->where('transaction','withdraw')
             ->where('type','atm')
             ->get();

             $ctrAmount = 0;

            foreach($transactionCheck as $transactionCheck2)
            {
                $ctrAmount += $transactionCheck2->amount;
            }

            $total2 = $ctrAmount + $amount;


            if($total2 > 20000)
            {
                Session::put('success_user_created', 'You are only allowed to withdraw a PHP 20,000 per day in ATM, 
                                        you already withdraw a PHP '. $ctrAmount);
               
            }
            else if($amount > $user->balance)
            {
                Session::put('success_user_created', "The amount you wish to withdraw is greater than your account balance (PHP ". $user->balance .").");
            }

            else
            {
                $currentBalance = $user->balance - $amount;

                $trans = new transaction;
                $trans->account_number = Auth::customer()->get()->id;
                $trans->transaction = 'withdraw';
                $trans->amount = $amount;
                $trans->total_balance = $currentBalance;
                $trans->type = "atm";


                $user->balance -= $amount ;

                $user->save();
                $trans->save();
               
                Session::put('success_user_created', 'You have successfully withdrawed from your account.');

                 
            }
            return Redirect::to('/atm/withdraw/{id}');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }

    public function transfer($id)
    {
        $user = Auth::find(Auth::customer()->get()->id);
        
        
        return View::make('atm.transfer_account')->with('user',$user);
    }


    public function storetransfer($id)
    {
       $inputs = Input::all();

        $user = Accounts::find(Auth::customer()->get()->id);
      
        $current_amount = DB::table('accounts')->where('id',Auth::customer()->get()->id)->sum('balance');

        $amount = $inputs['amount'];
        $transfer_acct = $inputs['acct'];
        


        $rules = array(     
            'amount'  => 'Required|numeric|',
             'acct'   => 'Required',
        );


        $validationResult = Validator::make($inputs, $rules);

        if ( $validationResult->passes() ) 
        {
            $currentBalance = $user->balance - $amount;

            $trans = new transaction;
            $trans->account_number = Auth::customer()->get()->id;
            $trans->transaction = 'transfer to '. $transfer_acct ;
            $trans->amount = $amount;
            $trans->total_balance = $currentBalance;
            $trans->type = "atm";

            $user->balance -= $amount ;

            $user->save();
            $trans->save();
           
            Session::put('success_user_created', 'You have successfully transferred your account.');

            return Redirect::to('/atm/transfer/{id}');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validationResult);
        }
    }


    public function logout()
    {

        if(Session::get('user_type'))
        {
            $redirection = '/otc';
        }
        else
        {
            $redirection = '/atm';
        }

        Auth::logout();
        Session::flush();
        Session::put('logout_successful', 'You have successfully logout.');
        return Redirect::to($redirection);
    }
}